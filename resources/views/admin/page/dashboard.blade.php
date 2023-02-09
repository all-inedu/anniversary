@extends('admin.main')
@section('content')
    <div class="card shadow mb-3 d-md-block d-none">
        <div class="card-body d-flex justify-content-between">
            <div class="">Dashboard</div>
            <div class="">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <div class="row row-cols-md-5 row-cols-1 g-2 mb-3">
                <div class="col">
                    <div class="card bg-warning">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h6 class="m-0 p-0">Total <br> Registrants</h6>
                            <h2 class="m-0 p-0">{{ $totalRegistrantByType['all'] }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card bg-success text-white">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h6 class="m-0 p-0">Total <br> Students</h6>
                            <h2 class="m-0 p-0">{{ $totalRegistrantByType['student'] }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card bg-info">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h6 class="m-0 p-0">Total <br> Parents</h6>
                            <h2 class="m-0 p-0">{{ $totalRegistrantByType['parent'] }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card bg-danger text-white">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h6 class="m-0 p-0">Total <br> Teachers</h6>
                            <h2 class="m-0 p-0">{{ $totalRegistrantByType['teacher'] }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card bg-primary text-white">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h6 class="m-0 p-0">Total <br> Info Session</h6>
                            <h2 class="m-0 p-0">{{ $totalUniInfoSession }}</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-3 g-3">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body py-2">
                            <h6 class="m-0 fw-bold text-center">Lead Source</h6>
                        </div>
                        <ul class="list-group list-group-flush overflow-auto px-3 py-2" style="height:300px">
                            @foreach ($leadSources as $leadSource)
                                <li class="list-group-item d-flex justify-content-between align-items-center py-1 px-0">
                                    <div class="">{{ $leadSource->lead_source_name }}</div>
                                    <div class="badge bg-primary">{{ $leadSource->sum }}</div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body py-2 d-flex justify-content-between">
                            <h6 class="m-0 fw-bold">Info Session Participants</h6>
                            <div class="fw-bold">30</div>
                        </div>
                        <ul class="list-group list-group-flush overflow-auto px-3 py-2" style="height:300px">

                            @foreach ($universitiesWithParticipants as $universityAndParticipant)
                                <li class="list-group-item d-flex justify-content-between align-items-center py-1 px-0">
                                    <div class="">{{ $universityAndParticipant->name }}</div>
                                    <div class="badge bg-primary">{{ $universityAndParticipant->participants }}</div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-dark text-white mb-3">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h6 class="m-0 p-0">University Preparation Talk<br> Participants</h6>
                            <h2 class="m-0 p-0">{{ $uniPrepRegistrants }}</h2>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body py-2">
                            <h6 class="m-0 fw-bold text-center">Latest Registrant</h6>
                        </div>
                        <ul class="list-group list-group-flush overflow-auto px-3 py-2" style="height:210px">
                            @foreach ($latestRegistrants as $latestRegistrant)
                                <li class="list-group-item d-flex justify-content-between align-items-center py-1 px-0">
                                    <div class="">{{ $latestRegistrant->fullname }}</div>
                                    <div class="badge bg-primary">{{ $latestRegistrant->client_type }}</div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
