<div class="container-fluid position-relative" id="scholarship">
    <img src="{{asset('img/asset 4.svg')}}" alt="" class="position-absolute d-md-inline-block d-none slide-fwd-center" style="left:-8%; bottom:-15%; width:25%;" >
    <div class="container h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-md-9 col-12">
                <div class="row align-items-center">
                    <div class="col-md-7">
                        <img src="{{ asset('img/logo-allin.png') }}" alt="" class="w-25">
                        <img src="{{ asset('img/scholarship.svg') }}" alt="" class="w-100">
                    </div>
                    <div class="col-md-5">
                        <div class="card bg-primary mb-2">
                            <div class="card-body subtitle-scholarship py-0 text-center text-white py-2">
                                Submission Deadline 25 March
                            </div>
                        </div>
                        <button class="btn btn-lg btn-warning btn-block w-100 py-1 text-dark">
                            <strong>
                                Click for more info
                            </strong>
                        </button>
                    </div>
                </div>
                <div class="row align-items-center g-1 justify-content-between">
                    <div class="col-md-6">
                        <img src="{{asset('img/scholarship-1.svg')}}" alt="" class="img-scholarship">
                    </div>
                    <div class="col-md-6 text-end">
                        <img src="{{asset('img/scholarship-2.svg')}}" alt="" class="img-scholarship">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    #scholarship {
        height: auto;
        padding: 7% 0;
    }

    .subtitle-scholarship {
        /* font-family: 'stereofidelic'; */
        font-size: 18px;
    }

    .img-scholarship {
        transition: all 0.3s ease-in-out;
        width: 98%;
    }

    .img-scholarship:hover {
            transform: scale(1.05)
        }
</style>
