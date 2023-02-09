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
                            <form action="{{ route('auth.logout') }}" method="POST">
                                @csrf
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-box-arrow-in-left me-2"></i>
                                Logout</button>
                            </form>
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
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {

        $(".change-status").each(function () {
            let _this = $(this);

            _this.click(function () {
                var status = _this.data('stats')
                var universityId = _this.parents().data('key')

                axios.put('{{ url("admin/info-session/") }}/' + status, {
                        "_method" : 'PUT',
                        "_token" : '{{ csrf_token() }}',
                        "uuid" : universityId,
                    }).then(function (response) {
                        notification('success', response.data.message)

                        if (status == "activate") {

                            _this.data('stats', 'deactivate').attr('title', 'Deactivated')
                            
                            var html = '<i class="bi bi-x text-danger"></i>'
                            _this.html(html)

                        } else {

                            _this.data('stats', 'activate').attr('title', 'Activate')
                            
                            var html = '<i class="bi bi-check text-success"></i>'
                            _this.html(html)
                        }


                    }).catch(function (error) {
                        notification('error', error.message)
                    })
            })
        })
    })
    </script>
    <script type="text/javascript">
        $(".delete-item").each(function() {
            var _this = $(this)

            _this.click(function(event) {
                event.preventDefault();

                var message = "Are you sure you want to delete this item?";
                if (confirm(message))
                {
                    axios.delete(_this.data('href'), {
                        _token: '{{ csrf_token() }}'
                        // _method: 'DELETE',
                    })
                        .then(function(response) {
                            notification('success', response.data.message)
                            location.reload()

                        }).catch(function(error) {
                            
                            notification('error', error.data.message)
                            location.reload()
                        })
                }
            })

        });
    </script>
@endsection
