<?php

namespace App\Http\Controllers;

use App\Interfaces\ClientRepositoryInterface;
use App\Interfaces\UniversityRepositoryInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AdminController extends Controller
{

    protected ClientRepositoryInterface $clientRepository;
    protected UniversityRepositoryInterface $universityRepository;

    public function __construct(ClientRepositoryInterface $clientRepository, UniversityRepositoryInterface $universityRepository)
    {
        $this->clientRepository = $clientRepository;
        $this->universityRepository = $universityRepository;
    }

    public function dashboard()
    {
        # count registrant by type
        $totalRegistrantByType = [
            'student' => $this->clientRepository->getRegistrantByType('student')->count(),
            'parent' => $this->clientRepository->getRegistrantByType('parent')->count(),
            'teacher' => $this->clientRepository->getRegistrantByType('teacher/counsellor')->count(),
        ];
        $item_sum = 0;
        foreach ($totalRegistrantByType as $type => $total) {
            $item_sum += $total;
        }
        $totalRegistrantByType['all'] = $item_sum;

        # count uni info session
        $totalUniInfoSession = $this->universityRepository->getUniversities()->count();

        # latest registrants
        $latestRegistrants = $this->clientRepository->getLatestRegistrants();

        # lead source
        $leadSources = $this->clientRepository->getLeadSources();

        # info session participants
        $universitiesWithParticipants = $this->universityRepository->getUniversitiesWithParticipants();

        # university prep talk participants
        $uniPrepRegistrants = $this->clientRepository->getRegistrantJoinUniPrep()->count();

        return view('admin.page.dashboard')->with(
            [
                'totalRegistrantByType' => $totalRegistrantByType,
                'totalUniInfoSession' => $totalUniInfoSession,
                'latestRegistrants' => $latestRegistrants,
                'leadSources' => $leadSources,
                'universitiesWithParticipants' => $universitiesWithParticipants,
                'uniPrepRegistrants' => $uniPrepRegistrants,
            ]
        );
    }

    public function getShortlisted(Request $request)
    {
        $univId = $request->route('uni');
        try {

            $university = $this->universityRepository->getUniversityById($univId);
            $html = '<table class="w-100" style="font-size:12px">
                        <thead>
                            <th>#</th>
                            <th>Name</th>
                            <th>From</th>
                        </thead>
                    <tbody>';
            $no = 1;
            foreach ($university->booking as $booking) {
    
                $html .= "
                            <tr>
                                <td>".$no++."</td>
                                <td>".$booking->client->fullname."</td>
                                <td>".$booking->client->graduate_from."</td>
                            </tr>
                        ";
    
            }

            $html .= '</tbody>
            </table>';

        } catch (Exception $e) {

            Log::error('Failed to get shortlist : '.$e->getMessage());

        }

        return response()->json(['html_ctx' => $html]);
    }

    public function infoSession()
    {
        $universities = $this->universityRepository->getUniversities();

        return view('admin.page.info-session')->with(
            [
                'universities' => $universities,
            ]
        );
    }

    public function registrant()
    {
        $registrants = $this->clientRepository->getAllRegistrants();

        return view('admin.page.registrant')->with(
            [
               'registrants' => $registrants,
            ]
        );
    }

    # info-session
    public function create()
    {
        return view('admin.page.info-session.form');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'session_start' => 'required',
            'time_start' => 'required',
            'description' => 'nullable',
            'status' => 'nullable',
            'thumbnail' => 'image|mimes:jpeg,jpg,png',
            'link' => 'required|url',
            'password' => 'required|min:6'
        ];

        $validate = Validator::make($request->only(['name', 'session_start', 'time_start', 'description', 'status', 'link', 'password']), $rules);
        if ($validate->fails())
            return Redirect::back()->withErrors($validate);

        $validatedDetails = $validate->validated();
        $validatedDetails['status'] = $request->input('status') == false ? 0 : 1;
        $validatedDetails['uuid'] = Str::uuid();
        // unset($validatedDetails['password']);
        // $validatedDetails['password'] = Hash::make($request->password);

        DB::beginTransaction();
        try {

            if ($request->has('thumbnail')) {
                
                $image = $request->file('thumbnail');
                $thumbnail_name = $image->hashName();
                $extension = $image->getClientOriginalExtension();
                $path = $image->storeAs(
                    'thumbnail',
                    $thumbnail_name,
                    'public'
                );
                if (!Storage::disk('public')->exists($path))
                    throw new Exception('File failed to upload');
                    
                $validatedDetails['thumbnail'] = $path;

            }

            $this->universityRepository->createUniversity($validatedDetails);
            DB::commit();

        } catch (Exception $e) {
            
            DB::rollBack();
            Log::error('Store university info session failed: '. $e->getMessage());
            return Redirect::back()->withErrors('Failed to create university info session.');

        }

        return Redirect::to('admin/info-session')->withSuccess('New university info session has successfully submitted.');
    }

    public function show(Request $request)
    {
        $uuid = $request->route('info_session');
        $university = $this->universityRepository->getUniversityById($uuid);

        return view('admin.page.info-session.form')->with(
            [
                'university' => $university,
            ]
        );
    }

    public function updateStatus(Request $request)
    {
        $newStatus = $request->route('status');
        $uuid = $request->uuid;

        $newDetails = [
            'status' => $newStatus == "activate" ? 1 : 0
        ];

        DB::beginTransaction();
        try {
            
            $this->universityRepository->editUniversity($uuid, $newDetails);
            DB::commit();
            
        } catch (Exception $e) {

            DB::rollBack();
            Log::error('Update university info session failed: '. $e->getMessage());
            return response()->json(['message' => 'Failed to update university info session.']);

        }

        return response()->json(['message' => 'University info session successfully updated.']);

    }

    public function update(Request $request)
    {
        $uuid = $request->route('info_session');
        $university = $this->universityRepository->getUniversityById($uuid);

        $rules = [
            'name' => 'required',
            'session_start' => 'required',
            'time_start' => 'required',
            'description' => 'nullable',
            'status' => 'nullable',
            'thumbnail' => 'image|mimes:jpeg,jpg,png',
            'link' => 'required|url',
            'password' => 'required|min:6',
        ];

        $validate = Validator::make($request->only(['name', 'session_start', 'time_start', 'description', 'status', 'link', 'password']), $rules);
        if ($validate->fails())
            return Redirect::back()->withErrors($validate);

        $newDetails = $validate->validated();
        $newDetails['status'] = $request->input('status') == false ? 0 : 1;
        // unset($newDetails['password']);
        // $newDetails['password'] = Hash::make($request->password);

        DB::beginTransaction();
        try {

            if ($request->has('thumbnail')) {
                
                $image = $request->file('thumbnail');
                $thumbnail_name = $image->hashName();
                $extension = $image->getClientOriginalExtension();
                $path = $image->storeAs(
                    'thumbnail',
                    $thumbnail_name,
                    'public'
                );

                if (Storage::disk('public')->exists($path))
                    # remove old thumbnail
                    if (File::exists(public_path('storage/'.$university->thumbnail)))
                        File::delete(public_path('storage/'.$university->thumbnail));
                    else
                        Log::info(public_path('storage/'.$university->thumbnail));
                else
                    throw new Exception('File failed to upload');
                    
                $newDetails['thumbnail'] = $path;

            }
            
            $this->universityRepository->editUniversity($uuid, $newDetails);
            DB::commit();
            
        } catch (Exception $e) {

            DB::rollBack();
            Log::error('Update university info session failed: '. $e->getMessage());
            return Redirect::back()->withErrors('Failed to update university info session.');

        }

        return Redirect::to('admin/info-session/view/'.$uuid)->withSuccess($university->name.' has been updated');
    
    }

    public function destroy(Request $request)
    {
        $uuid = $request->route('info_session');

        DB::beginTransaction();
        try {

            $this->universityRepository->deleteUniversity($uuid);
            DB::commit();

        } catch (Exception $e) {

            DB::rollBack();
            Log::error('Delete university info session failed: '. $e->getMessage());
            return response()->json(['message' => 'Failed to delete university info session.']);

        }

        return response()->json(['message' => 'Successfully deleted university info session.']);
    }

    # register client manually
    public function registerClient(Request $request)
    {
        $rules = [
            'fullname' => 'required|max:255',
            'email_address' => 'required|email|max:255|unique:tbl_client,email_address',
        ];

        $validate = Validator::make($request->all(), $rules);
        if ($validate->fails()) {
            return Redirect::back()->withInput($request->input())->withErrors($validate->errors());
        }

        $clientDetails = [
            'uuid' => Str::uuid(),
            'fullname' => $validate->valid()['fullname'],
            'email_address' => $validate->valid()['email_address'],
            'phone_number' => null,
            'address' => null,
            'client_type' => 'student',
            'grade' => null,
            'graduate_from' => null,
            'lead_source_id' => null,
            'challenge_id' => null,
            'challenge_other' => null,
            'lead_other' => null,
            'major_other' => null,
            'first_time' => 1,
            'uni_prep' => 1,
            'status' => 1
        ];


        DB::beginTransaction();
        try {

            $this->clientRepository->registerClient($clientDetails);
            DB::commit();

        } catch (Exception $e) {

            DB::rollBack();
            Log::error('Failed register client from admin failed: '. $e->getMessage());
            return Redirect::back()->withErrors('Failed to register client.');

        }

        return Redirect::to('admin/registrant')->withSuccess('Registered client successfully');

    } 
}
