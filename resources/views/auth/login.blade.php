@extends('app')
@section('body')
    <div class="container-fluid" style="height:100vh">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-3">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <img src="{{ asset('img/logo-allin.png') }}" alt="" class="w-50">
                            <h5 class="m-0 p-0">
                                Login
                            </h5>
                        </div>
                        <hr>
                        <form action="{{ route('auth.login') }}" method="POST">
                            @csrf
                            <div class="mb-2">
                                <label for="">Email</label>
                                <input type="text" name="email" id="" class="form-control rounded">
                            </div>
                            <div class="mb-2">
                                <label for="">Password</label>
                                <input type="password" name="password" id="" class="form-control rounded">
                            </div>
                            <hr>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary px-3">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
