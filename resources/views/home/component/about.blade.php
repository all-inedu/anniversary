<div class="container-fluid position-relative overflow-hidden" id="about">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-lg-3 col-6">
                <img src="{{ asset('img/about-us.svg') }}" alt="" class="w-100">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-7 col-11 mb-lg-5 mb-3 about-subtitle">
                <strong>
                    We guide students who plan to study at top universities abroad and place them at their best fit
                    schools. We provide personal and tailored consulting services, no matter where you are.
                </strong>
            </div>
            <div class="col-lg-9 col-11">
                <div class="row row-cols-lg-3 row-cols-1 justify-content-center g-lg-4 g-2">
                    <div class="col mb-lg-3 d-flex align-items-center card-about">
                        <div class="w-25 text-end about-icon">
                            <img src="{{ asset('img/about-1.svg') }}" alt="" class="w-100">
                        </div>
                        <p class="text-start m-0 py-0 px-3">
                            100% Students placed at target universities
                        </p>
                    </div>
                    <div class="col mb-lg-3 d-flex align-items-center card-about">
                        <div class="w-25 text-end about-icon">
                            <img src="{{ asset('img/about-2.svg') }}" alt="" class="w-100">
                        </div>
                        <p class="text-start m-0 py-0 px-3">
                            100% Students placed at target universities
                        </p>
                    </div>
                    <div class="col mb-lg-3 d-flex align-items-center card-about">
                        <div class="w-25 text-end about-icon">
                            <img src="{{ asset('img/about-3.svg') }}" alt="" class="w-100">
                        </div>
                        <p class="text-start m-0 py-0 px-3">
                            100% Students placed at target universities
                        </p>
                    </div>
                    <div class="col mb-lg-3 d-flex align-items-center card-about">
                        <div class="w-25 text-end about-icon">
                            <img src="{{ asset('img/about-4.svg') }}" alt="" class="w-100">
                        </div>
                        <p class="text-start m-0 py-0 px-3">
                            100% Students placed at target universities
                        </p>
                    </div>
                    <div class="col mb-lg-3 d-flex align-items-center card-about">
                        <div class="w-25 text-end about-icon">
                            <img src="{{ asset('img/about-5.svg') }}" alt="" class="w-100">
                        </div>
                        <p class="text-start m-0 py-0 px-3">
                            100% Students placed at target universities
                        </p>
                    </div>
                    <div class="col mb-lg-3 d-flex align-items-center card-about">
                        <div class="w-25 text-end about-icon">
                            <img src="{{ asset('img/about-6.svg') }}" alt="" class="w-100">
                        </div>
                        <p class="text-start m-0 py-0 px-3">
                            100% Students placed at target universities
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    #about {
        padding: 5% 0;
    }
    
    .card-about {
        transition: all 0.3s ease-in-out;
        padding: 10px;
        border-radius: 10px
    }

    .card-about:hover {
        background: var(--bs-blue);
        box-shadow: 2px 2px #dedede;
        color: white;
    }

    .about-icon img {
        weight: 40px;
        height: 40px;
        object-fit: contain;
    }

    .about-subtitle {
        font-size: 1.3em
    }

    @media only screen and (max-width: 600px) {
        .about-subtitle {
            font-size: 16px;
        }

        .card-about {
        border-top:1px solid #dedede;
    }

    .card-about:first-child {
        border-top:none;
    }

    }
</style>
