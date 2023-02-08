@extends('app')
@section('body')
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-md-3 mb-3">
                <div class="card sticky-top shadow">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <img src="{{ asset('img/logo-allin.png') }}" alt="" class="w-25">
                            <div class="fw-bold">MENUS</div>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item px-0">
                                <a href="{{ url('admin/dashboard') }}"
                                    class="text-decoration-none text-dark d-flex justify-content-between">
                                    Dashboard <i class="bi bi-arrow-right"></i>
                                </a>
                            </li>
                            <li class="list-group-item px-0">
                                <a href="{{ url('admin/info-session') }}"
                                    class="text-decoration-none text-dark d-flex justify-content-between">
                                    Info Session <i class="bi bi-arrow-right"></i>
                                </a>
                            </li>
                            <li class="list-group-item px-0">
                                <a href="{{ url('admin/registrant') }}"
                                    class="text-decoration-none text-dark d-flex justify-content-between">
                                    Registrant <i class="bi bi-arrow-right"></i>
                                </a>
                            </li>
                        </ul>
                        <div class="text-center mt-4">
                            <button class="btn btn-primary">
                                <i class="bi bi-box-arrow-in-left me-2"></i>
                                Logout</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                @yield('content')
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('table').DataTable({
                responsive: true,
                dom: 'Bfrtip',
                buttons: [
                    'excel'
                ]
            });
        });
    </script>
    <style>
        .form-control {
            outline: none !important;
            box-shadow: none !important;
        }
    </style>
@endsection
