@extends('admin.main')
@section('content')
    <div class="card shadow mb-3 d-md-block d-none">
        <div class="card-body d-flex justify-content-between">
            <div class="">University Info Session</div>
            <div class="">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item active">Info Session</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <div class="text-end mb-3">
                <a href="{{url('admin/info-session/create')}}" class="btn btn-primary"><i class="bi bi-plus me-2"></i> Add a New</a>
            </div>
            <div class="table-responsive">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>University Name</th>
                            <th>Session Date</th>
                            <th>Session Time</th>
                            <th>Thumbnail</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($universities as $university)
                            <tr valign="middle">
                                <td>{{ $university->name }}</td>
                                <td>{{ date('d F Y', strtotime($university->session_start)) }}</td>
                                <td>{{ date('H.i A', strtotime($university->time_start)) }}</td>
                                <td>
                                    <img src="{{ asset('storage/'.$university->thumbnail) }}" class="w-50" alt="">
                                </td>
                                <td class="fw-bold" style="font-size:22px;" data-key="{{ $university->uuid }}">
                                    @if ($university->status == 0)
                                    <a href="javascript:void(0)" class="activate" title="Activate">
                                        <i class="bi bi-check text-success" ></i>
                                    </a>
                                    @else
                                    <a href="javascript:void(0)" class="deactivate" title="Deactivate">
                                        <i class="bi bi-x text-danger"></i>
                                    </a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{url('admin/info-session/view/1')}}" class="btn btn-sm btn-outline-warning">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash2"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
