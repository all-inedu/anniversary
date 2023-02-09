@extends('admin.main')
@section('content')
    <div class="card shadow mb-3">
        <div class="card-body d-flex justify-content-between">
            <div class="">University Info Session</div>
            <div class="">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{url('admin/info-session')}}" class="text-decoration-none">Info Session</a> </li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('admin.store.info-session') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h4>Add New</h4>
                <hr>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-4">
                        <div class="border w-100 mb-2" style="height:200px">
                            <img id="imgPreview" src="{{asset('img/default.png')}}" alt="pic" />
                        </div>
                        <input type="file" name="thumbnail" class="form-control" id="thumbnail">
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <label for="">University Name <sup class="text-danger">*</sup></label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-2">
                                <label for="">Session Date <sup class="text-danger">*</sup></label>
                                <input type="date" name="session_start" class="form-control" value="{{ old('session_start') }}">
                            </div>
                            <div class="col-6 mb-2">
                                <label for="">Session Time <sup class="text-danger">*</sup></label>
                                <input type="time" name="time_start" class="form-control" value="{{ old('time_start') }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-2">
                                <label for="">Description</label>
                                <textarea name="description" class="form-control" rows="10">{{ old('description') }}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-2">
                                <input type="checkbox" name="status" onclick="$(this).val(this.checked ? 1 : 0)"> show to public?
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="text-end">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(() => {
            $("#thumbnail").change(function() {
                const file = this.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        $("#imgPreview")
                            .attr("src", event.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>

    <style>
        #imgPreview {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
    </style>
@endsection
