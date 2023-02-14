@extends('admin.main')
@section('content')
    <div class="card shadow mb-3 d-md-block d-none">
        <div class="card-body d-flex justify-content-between">
            <div class="">Registrant</div>
            <div class="">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item active">Registrant</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped" style="width:100%;font-size:12px;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Lead Source</th>
                            <th>First Time?</th>
                            <th>Address</th>
                            <th>Uni Info Session</th>
                            <th>Uni Prep Talk</th>
                            <th>Status</th>
                            <th>Join At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($registrants as $registrant)
                            <tr valign="middle">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $registrant->fullname }}</td>
                                <td>{{ $registrant->email_address }}</td>
                                <td>{{ $registrant->phone_number }}</td>
                                <td>{{ $registrant->lead_source->name ?? $registrant->lead_other }}</td>
                                <td>{{ $registrant->first_time == 1 ? "Yes" : "No" }}</td>
                                <td>{{ $registrant->address }}</td>
                                <td>
                                    @if ($registrant->booking)
                                        <ul style="margin:0;padding:0;list-style:numbering">
                                        @foreach ($registrant->booking->university as $booked_university)
                                            <li>{{ $booked_university->name }}</li>   
                                        @endforeach
                                        </ul>
                                    @else
                                    -
                                    @endif
                                </td>
                                <td>{{ $registrant->uni_prep == 1 ? "Yes" : "No" }}</td>
                                <td>{{ $registrant->status == 1 ? "Active" : "Not Active" }}</td>
                                <td>{{ date('d F Y H:i:s', strtotime($registrant->created_at)) }}</td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
