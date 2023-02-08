<?php

namespace App\Http\Controllers;

use App\Interfaces\ChallengeRepositoryInterface;
use App\Interfaces\ClientRepositoryInterface;
use App\Interfaces\DestinationRepositoryInterface;
use App\Interfaces\LeadSourceRepositoryInterface;
use App\Interfaces\MajorRepositoryInterface;
use App\Interfaces\SchoolRepositoryInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class RegisterController extends Controller
{

    protected ClientRepositoryInterface $clientRepository;
    protected SchoolRepositoryInterface $schoolRepository;
    protected DestinationRepositoryInterface $destinationRepository;
    protected MajorRepositoryInterface $majorRepository;
    protected LeadSourceRepositoryInterface $leadSourceRepository;
    protected ChallengeRepositoryInterface $challengeRepository;

    public function __construct(ClientRepositoryInterface $clientRepository, SchoolRepositoryInterface $schoolRepository, DestinationRepositoryInterface $destinationRepository, MajorRepositoryInterface $majorRepository, LeadSourceRepositoryInterface $leadSourceRepository, ChallengeRepositoryInterface $challengeRepository)
    {
        $this->clientRepository = $clientRepository;
        $this->schoolRepository = $schoolRepository;
        $this->destinationRepository = $destinationRepository;
        $this->majorRepository = $majorRepository;
        $this->leadSourceRepository = $leadSourceRepository;
        $this->challengeRepository = $challengeRepository;
    }

    public function index()
    {
        $schools = $this->schoolRepository->getSchools();
        $destinations = $this->destinationRepository->getDestinations();
        $majors = $this->majorRepository->getMajors();
        $leads = $this->leadSourceRepository->getLeadSources();
        $challenges = $this->challengeRepository->getChallenges();

        return view('home.register')->with(
            [
                'schools' => $schools,
                'destinations' => $destinations,
                'majors' => $majors,
                'leads' => $leads,
                'challenges' => $challenges,
            ]
        );
    }

    public function store(Request $request)
    {
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
            if (in_array('Other', $majors)) {
                
                $idx_position = array_search('Other', $majors);
                unset($majors[$idx_position]);
            }
            $this->clientRepository->storeMajor($clientId, $majors);
            DB::commit();

        } catch (Exception $e) {

            DB::rollBack();
            Log::error('Registration client failed : '.$e->getMessage());
            return $e->getMessage();

        }

        return 'success';

    }
}
