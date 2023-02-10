<div class="container-fluid position-relative" id="scholarship">
    <img src="{{ asset('img/asset 4.svg') }}" alt=""
        class="position-absolute d-md-inline-block d-none slide-fwd-center" style="left:-13%; bottom:-15%; width:25%;">
    <div class="container h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-md-9 col-11">
                <div class="row align-items-center mb-3">
                    <div class="col-md-7" data-aos="fade-up">
                        <img src="{{ asset('img/home/logo.png') }}" alt="" class="w-25">
                        <img src="{{ asset('img/scholarship/Scholarships.webp') }}" alt="" class="w-100">
                    </div>
                    <div class="col-md-5" data-aos="fade-up">
                        <div class="card bg-primary mb-2">
                            <div class="card-body subtitle-scholarship py-0 text-center text-white py-2 text-uppercase">
                                Submission Deadline 25 March
                            </div>
                        </div>
                        <a href="{{ url('/scholarship') }}"
                            class="btn btn-lg btn-warning btn-block w-100 py-1 text-dark text-uppercase">
                            <strong>
                                Click for more info
                            </strong>
                        </a>
                    </div>
                </div>
                <div class="row align-items-center g-1 justify-content-between" data-aos="fade-up">
                    <div class="col-md-6">
                        <img src="{{ asset('img/scholarship/Scholarship passion project.webp') }}" alt=""
                            class="img-scholarship">
                    </div>
                    <div class="col-md-6 text-end">
                        <img src="{{ asset('img/scholarship/Scholarship admission mentoring.webp') }}" alt=""
                            class="img-scholarship">
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
        font-size: 18px;
    }

    .img-scholarship {
        transition: all 0.3s ease-in-out;
        width: 98%;
    }

    .img-scholarship:hover {
        transform: scale(1.05)
    }

    @media only screen and (max-width: 600px) {
        #scholarship {
            height: auto;
            padding: 2% 0;
        }

        .subtitle-scholarship {
            font-size: 14px;
        }

        .img-scholarship {
            transition: all 0.3s ease-in-out;
            width: 100%;
        }

        .img-scholarship:hover {
            transform: none
        }
    }
</style>
