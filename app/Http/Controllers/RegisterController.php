<?php

namespace App\Http\Controllers;

use App\Http\Traits\SendEmail;
use App\Interfaces\BookingRepositoryInterface;
use App\Interfaces\ChallengeRepositoryInterface;
use App\Interfaces\ClientRepositoryInterface;
use App\Interfaces\DestinationRepositoryInterface;
use App\Interfaces\LeadSourceRepositoryInterface;
use App\Interfaces\MajorRepositoryInterface;
use App\Interfaces\SchoolRepositoryInterface;
use App\Interfaces\UniversityRepositoryInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    use SendEmail;
    protected ClientRepositoryInterface $clientRepository;
    protected SchoolRepositoryInterface $schoolRepository;
    protected DestinationRepositoryInterface $destinationRepository;
    protected MajorRepositoryInterface $majorRepository;
    protected LeadSourceRepositoryInterface $leadSourceRepository;
    protected ChallengeRepositoryInterface $challengeRepository;
    protected UniversityRepositoryInterface $universityRepository;
    protected BookingRepositoryInterface $bookingRepository;
    
    

    public function __construct(ClientRepositoryInterface $clientRepository, SchoolRepositoryInterface $schoolRepository, DestinationRepositoryInterface $destinationRepository, MajorRepositoryInterface $majorRepository, LeadSourceRepositoryInterface $leadSourceRepository, ChallengeRepositoryInterface $challengeRepository, UniversityRepositoryInterface $universityRepository, BookingRepositoryInterface $bookingRepository)
    {
        $this->clientRepository = $clientRepository;
        $this->schoolRepository = $schoolRepository;
        $this->destinationRepository = $destinationRepository;
        $this->majorRepository = $majorRepository;
        $this->leadSourceRepository = $leadSourceRepository;
        $this->challengeRepository = $challengeRepository;
        $this->universityRepository = $universityRepository;
        $this->bookingRepository = $bookingRepository;
    }

    public function index()
    {

        $schools = $this->schoolRepository->getSchools();
        $destinations = $this->destinationRepository->getDestinations();
        $majors = $this->majorRepository->getMajors();
        $leads = $this->leadSourceRepository->getLeadSources();
        $challenges = $this->challengeRepository->getChallenges();
        $universities = $this->universityRepository->getActiveUniversities();

        return view('home.register')->with(
            [
                'schools' => $schools,
                'destinations' => $destinations,
                'majors' => $majors,
                'leads' => $leads,
                'challenges' => $challenges,
                'universities' => $universities,
            ]
        );
    }

    public function store(Request $request)
    {
        $school_rules = $request->school == 'Other' ? null : 'exists:mysql_crm.u5794939_allin_bd.tbl_sch,sch_name';
        // $major_rules = in_array('Other', $request->major) ? null : 'exists:tbl_major,id';


        $rules = [
            'fullname' => 'required|max:255',
            'email_address' => 'required|email|max:255|unique:tbl_client,email_address',
            'address' => 'required',
            'role' => 'required|in:student,teacher/consellor,parent',
            'uni_prep' => 'required',
            'first_time' => 'required',
            'grade' => 'required_if:role,student,parent',
            'school' => [
                'required_if:role,student,parent',
                $school_rules
            ],
            'school_other' => 'required_if:school,Other',
            'country.*' => 'exists:tbl_destination,id',
            'major.*' => [
                'required_if:role,student,parent',
                // $major_rules
            ],
            'major_other' => 'required_if:major,Other',
            'lead' => 'required|exists:tbl_lead_source,id',
            'challenge' => 'required|exists:tbl_biggest_challenge,id',
        ];

        $validate = Validator::make($request->all(), $rules);
        if ($validate->fails()) {
            return Redirect::back()->withErrors($validate->errors());
        }

        $clientDetails = $request->only([
            'fullname',
            'email_address',
            'phone_number',
            'address',
            'grade',
            'school',
            'school_other',
            'lead_other',
            'challenge_other',
            'uni_prep',
            'first_time',
            'major_other',
        ]);

        $clientDetails['uuid'] = Str::uuid();
        $clientDetails['client_type'] = $request->role;
        $clientDetails['uni_prep'] = $request->uni_prep == "yes" ? 1 : 0;
        $clientDetails['graduate_from'] = $request->school == "Other" ? $request->school_other : $request->school;
        $clientDetails['lead_source_id'] = $request->lead == "Other" ? null : $request->lead;
        $clientDetails['challenge_id'] = $request->challenge == "Other" ? null : $request->challenge;
        $clientDetails['first_time'] = 1;

        $destinations = $request->country;
        $majors = $request->major;

        $university_booked = json_decode($request->uni_select);

        DB::beginTransaction();
        try {            
            # regist new client
            $client = $this->clientRepository->registerClient($clientDetails);
            $clientId = $client->id;

            # store destination
            $this->clientRepository->storeDestination($clientId, $destinations);

            # store major
            # if other is exist in array
            # change the value "Other" into major_id
            if ($majors) {
                if (in_array('Other', $majors)) {
                    
                    $idx_position = array_search('Other', $majors);
                    unset($majors[$idx_position]);
                }
                $this->clientRepository->storeMajor($clientId, $majors);
            }

            # store university booked
            if ($university_booked) {
                $bookingDetails = [
                    'client_id' => $clientId,
                    'join_anniv' => $clientDetails['uni_prep'],
                    'booking_date' => Carbon::now(),
                    'total_booked_univ' => count($university_booked)
                ];
    
                foreach ($university_booked as $booked) {
                    $univInfo = $this->universityRepository->getUniversityById($booked->id);
                    $bookingUnivDetails[] = [
                        'univ_id' => $univInfo->id,
                        'question' => $booked->questions
                    ];
                    
                }
                
                $booking = $this->bookingRepository->createBooking($bookingDetails);
                $bookingId = $booking->id;
                $this->bookingRepository->storeBookedUniversities($bookingId, $bookingUnivDetails);
            }

        } catch (Exception $e) {

            DB::rollBack();
            Log::error('Registration client failed : '.$e->getMessage());
            return Redirect::back()->withError('There was an error while registering. Please try again.');

        }

        # send Mail
        try {

            $this->sendWelcomingMessage([
                'client' => $client,
                'subject' => 'Welcome to ANNIFEST!',
                'recipient' => [
                    'email' => $client->email_address,
                    'name' => $client->fullname
                ],
                'link' => route('user.profile', ['uuid' => str_replace('-','%20',$client->uuid)])
            ]);
        } catch (Exception $e) {
            
            DB::rollBack();
            Log::error('Registration client failed : '.$e->getMessage());
            return Redirect::back()->withError('There was an error while registering. Please try again.');
        }
        
        DB::commit();

        return Redirect::to('/')->withSuccess('Your registration has saved. Please do check your email');

    }

    public function profile(Request $request)
    {
        $uuid = str_replace(' ', '-', $request->route('uuid'));
        if (!$client = $this->clientRepository->getClientByUuid($uuid))
            abort(404);
        
        if ($client->booking->university()->where('session_start', '<', now())->count() > 0)
            abort(404);

        
        $booked_universities = $client->booking->university;
        $universities = $this->universityRepository->getUniversities();

        return view('home.user')->with(
            [
                'client' => $client,
                'booked_universities' => $booked_universities,
                'universities' => $universities,
            ]
        );
    }

    public function updateProfile (Request $request)
    {
        $uuid = str_replace(' ', '-', $request->route('uuid'));
        $client = $this->clientRepository->getClientByUuid($uuid);
        $bookingId = $client->booking->id;

        $booked_universities = $request->booked;
        if (count($booked_universities) == 0)
            $newBookingUnivDetails = [];

        foreach ($booked_universities as $detail) {
            $bookingDetail = $this->universityRepository->getUniversityById($detail['id']);
            $newBookingUnivDetails[] = [
                'univ_id' => $bookingDetail->id,
                'question' => isset($detail['questions']) ? $detail['questions'] : null 
            ];
        }

        DB::beginTransaction();
        try {

            # update booked univ
            $this->bookingRepository->updateBookedUniversities($bookingId, $newBookingUnivDetails);

            # update booked total univ
            $this->bookingRepository->updateBooking($bookingId, ['total_booked_univ' => count($newBookingUnivDetails)]);
            
            DB::commit();

        } catch (Exception $e) {

            DB::rollBack();
            Log::error('Update booking universities failed : '.$e->getMessage());
            return response()->json(['message' => 'There was an error while updating. Please try again.']);

        }

        return response()->json(['message' => 'Update booking success.']);
    }

    public function destroyProfile(Request $request)
    {
        return $request->all();
        $universityId = str_replace(' ', '-', $request->route('universityid'));
        $userUUid = $request->client;
        $user = $this->clientRepository->getClientByUuid($userUUid);

        DB::beginTransaction();
        try {

            $user->booking()->detach($universityId);
            // $this->universityRepository->deleteUniversity($universityId);
            DB::commit();

        } catch (Exception $e) {

            DB::rollBack();
            Log::error('Delete booked universities failed : '.$e->getMessage());
            return response()->json(['message' => 'There was an error while canceling. Please try again.']);

        }

        return response()->json(['message' => 'Cancel university success.']);
    }

}
