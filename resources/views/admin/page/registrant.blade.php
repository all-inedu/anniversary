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
    <div class="my-4 d-flex justify-content-end">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registerClientModal"><i class="bi bi-journal-plus me-2"></i> Add Client</button>
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

    <!-- Modal -->
    <div class="modal fade" id="registerClientModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Client</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.registerClient') }}" method="POST" id="registerClientForm">
                        @csrf
                        <div class="mb-3">
                            <label for="client-name" class="col-form-label">Full Name:</label>
                            <input type="text" class="form-control" name="fullname" value="{{ old('fullname') }}">
                            @error('fullname')
                                <small class="text-warning">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="client-email" class="col-form-label">Email:</label>
                            <input type="text" class="form-control" name="email_address" value="{{ old('email_address') }}">
                            @error('email_address')
                                <small class="text-warning">{{ $message }}</small>
                            @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" form='registerClientForm'  class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    @if ($errors->any())
    <script>
        $(document).ready(function () {
            $("#registerClientModal").modal('show')
        });
    </script>
    @endif
@endsection
