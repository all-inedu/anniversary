<div class="container-fluid" id="ibdp">
    <img src="{{ asset('img/hand-1.svg') }}" alt="" class="rotate position-absolute d-md-block d-none hand-1" data-aos="fade-right">
    <img src="{{ asset('img/hand-2.svg') }}" alt=""
        class="rotate-reverse position-absolute d-md-block d-none hand-2" data-aos="fade-right">
    <img src="{{ asset('img/hand-3.svg') }}" alt="" class="rotate position-absolute d-md-block d-none hand-3" data-aos="fade-left">
    <img src="{{ asset('img/hand-4.svg') }}" alt=""
        class="rotate-reverse position-absolute d-md-block d-none hand-4" data-aos="fade-left">
    <div class="container h-100">
        <div class="row justify-content-center align-items-center h-100 ibdp-content">
            <div class="col-md-9 col-12">
                <div class="row g-md-5 align-items-center justify-content-center">
                    <div class="col-md-8 order-md-0 order-1">
                        <img src="{{ asset('img/Mastering ibdp.svg') }}" alt="" width="100%">
                        <h4 class="ibdp-subtitle" style="">Technical Preparation and Strategies for Final Exam
                            Success</h4>
                        <div class="row mt-3 g-2">
                            <div class="col">
                                <div class="card bg-primary">
                                    <div class="card-body ibdp-date text-center text-white py-2">
                                        17-24 March | 6 PM
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bg-primary">
                                    <div class="card-body ibdp-date text-center text-white py-2">
                                        06.00 PM - 07.30 PM
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-2">
                                <a href="https://bit.ly/mastering-IBDP-rsvp" target="_blank" class="btn btn-lg btn-block btn-warning w-100 py-1 text-dark">
                                    <strong>
                                        REGISTER NOW
                                    </strong>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-11 order-md-1 order-0 mb-4">
                        <div class="row row-cols-2 g-2 align-items-center justify-content-center">
                            <div class="col-6 text-center">
                                <img src="{{ asset('img/Chemistry.svg') }}" alt="" width="80%"
                                    class="rotate">
                            </div>
                            <div class="col-6 text-center">
                                <img src="{{ asset('img/Math.svg') }}" alt="" width="70%"
                                    class="rotate-reverse">
                            </div>
                            <div class="col-6 text-center">
                                <img src="{{ asset('img/English.svg') }}" alt="" width="90%" class="rotate">
                            </div>
                            <div class="col-6 text-center">
                                <img src="{{ asset('img/Physics.svg') }}" alt="" width="65%"
                                    class="rotate-reverse">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    #ibdp {
        position: relative;
        height: auto;
        overflow: hidden;
        padding: 5% 0 0 0;
    }

    .ibdp-subtitle {
        letter-spacing: 0; 
        font-weight:bold;
        text-transform:uppercase;
        font-size: 1.2em;
    }

    .ibdp-content {
        padding: 100px 0;
    }

    .ibdp-date {
        font-size: 18px;
    }

    .hand-1 {
        left: -5px;
        top: 0px;
    }

    .hand-2 {
        left: -5px;
        bottom: -50px;
    }

    .hand-3 {
        right: -5px;
        top:0px;
    }

    .hand-4 {
        right: -5px;
        bottom: -50px;
    }

    @media only screen and (max-width: 600px) {
        #ibdp {
            height: auto;
            margin: 50px 0;
        }
    }
</style>
