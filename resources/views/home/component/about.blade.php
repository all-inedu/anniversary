<div class="container-fluid position-relative overflow-hidden" id="home">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-md-3 col-12">
                <img loading="lazy" src="{{ asset('img/about-us.svg') }}" alt="" class="w-100">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-7 mb-5" style="font-size: 1.3em">
                <strong>
                    We guide students who plan to study at top universities abroad and place them at their best fit schools. We provide personal and tailored consulting services, no matter where you are.
                </strong>
            </div>
            <div class="col-md-12">
                <div class="row row-cols-4 justify-content-center g-4">
                    <div class="col mb-3 d-flex align-items-center card-about">
                        <img loading="lazy" src="{{asset('img/about-1.svg')}}" alt="" class="icon-about">
                        <p class="text-start m-0 py-0 px-3">
                            100% Students placed at target universities
                        </p>
                    </div>
                    <div class="col mb-3 d-flex align-items-center card-about">
                        <img loading="lazy" src="{{asset('img/about-2.svg')}}" alt="" class="icon-about">
                        <p class="text-start m-0 py-0 px-3">
                            100% Students placed at target universities
                        </p>
                    </div>
                    <div class="col mb-3 d-flex align-items-center card-about">
                        <img loading="lazy" src="{{asset('img/about-3.svg')}}" alt="" class="icon-about">
                        <p class="text-start m-0 py-0 px-3">
                            100% Students placed at target universities
                        </p>
                    </div>
                    <div class="col mb-3 d-flex align-items-center card-about">
                        <img loading="lazy" src="{{asset('img/about-4.svg')}}" alt="" class="icon-about">
                        <p class="text-start m-0 py-0 px-3">
                            100% Students placed at target universities
                        </p>
                    </div>
                    <div class="col mb-3 d-flex align-items-center card-about">
                        <img loading="lazy" src="{{asset('img/about-5.svg')}}" alt="" class="icon-about">
                        <p class="text-start m-0 py-0 px-3">
                            100% Students placed at target universities
                        </p>
                    </div>
                    <div class="col mb-3 d-flex align-items-center card-about">
                        <img loading="lazy" src="{{asset('img/about-6.svg')}}" alt="" class="icon-about">
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

    .icon-about {
        weight:40px;
        height: 40px;
        object-fit: contain;
    }
</style>