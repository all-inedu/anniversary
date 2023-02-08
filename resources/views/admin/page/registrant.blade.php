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
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
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
                        <tr valign="middle">
                            <td>Full Name</td>
                            <td>Email</td>
                            <td>Phone</td>
                            <td>Lead Source</td>
                            <td>Yes</td>
                            <td>Address</td>
                            <td>Uni Info Session</td>
                            <td>Uni Prep Talk</td>
                            <td>Status</td>
                            <td>Join At</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
