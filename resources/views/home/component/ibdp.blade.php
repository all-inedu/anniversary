<div class="container-fluid" id="ibdp">
    <img src="{{ asset('img/ibdp/tangan 1.png') }}" alt=""
        class="rotate position-absolute d-md-block d-none hand-1" data-aos="fade-right">
    <img src="{{ asset('img/ibdp/tangan 4.png') }}" alt=""
        class="rotate-reverse position-absolute d-md-block d-none hand-2" data-aos="fade-right">
    <img src="{{ asset('img/ibdp/tangan 3.webp') }}" alt=""
        class="rotate position-absolute d-md-block d-none hand-3" data-aos="fade-left">
    <img src="{{ asset('img/ibdp/tangan 2.png') }}" alt=""
        class="rotate-reverse position-absolute d-md-block d-none hand-4" data-aos="fade-left">
    <div class="container h-100">
        <div class="row justify-content-center align-items-center h-100 ibdp-content">
            <div class="col-md-9 col-11" >
                <div class="row g-md-5 align-items-center justify-content-center">
                    <div class="col-md-8 order-md-0 order-1" data-aos="fade-up" data-aos-offset="100" >
                        <img src="{{ asset('img/ibdp/Mastering ibdp.webp') }}" alt="" width="100%">
                        <h4 class="ibdp-subtitle text-md-start text-center" style="">Technical Preparation and Strategies for Final Exam
                            Success</h4>
                        <div class="row mt-3 g-2 align-items-strecth">
                            <div class="col">
                                <div class="card bg-primary h-100">
                                    <div class="card-body ibdp-date d-flex align-items-center text-center text-white py-2">
                                        17-24 March | 6 PM
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bg-primary h-100">
                                    <div class="card-body ibdp-date d-flex align-items-center text-center text-white py-2">
                                        06.00 PM - 07.30 PM
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-2">
                                <a href="https://bit.ly/mastering-IBDP-rsvp" target="_blank"
                                    class="btn btn-lg btn-block btn-warning w-100 py-1 text-dark fw-bold">
                                        REGISTER NOW
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-9 order-md-1 order-0 mb-4" data-aos="fade-up" data-aos-offset="200">
                        <div class="row row-cols-2 g-2 align-items-center justify-content-center">
                            <div class="col-6 text-center">
                                <img src="{{ asset('img/ibdp/Chemistry.webp') }}" alt="" width="80%"
                                    class="rotate">
                            </div>
                            <div class="col-6 text-center">
                                <img src="{{ asset('img/ibdp/Math.webp') }}" alt="" width="75%"
                                    class="rotate-reverse">
                            </div>
                            <div class="col-6 text-center">
                                <img src="{{ asset('img/ibdp/English.webp') }}" alt="" width="85%" class="rotate">
                            </div>
                            <div class="col-6 text-center">
                                <img src="{{ asset('img/ibdp/Physics.webp') }}" alt="" width="70%"
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
        letter-spacing: -1px;
        font-weight: 900;
        text-transform: uppercase;
        font-size: 1.05em;
    }

    .ibdp-content {
        padding: 100px 0;
    }

    .ibdp-date {
        font-size: 18px;
        font-weight: 500;
    }

    .hand-1 {
        left: -10%;
        top: 0;
        width: 25%;
    }

    .hand-2 {
        left: -5px;
        bottom: 0;
        width: 15%;
    }

    .hand-3 {
        right: -2%;
        top: 0px;
        width: 15%;
    }

    .hand-4 {
        right: -5%;
        bottom: 5%;
        width: 20%;
    }

    @media only screen and (max-width: 600px) {
        #ibdp {
            height: auto;
            margin: 0;
            padding: 0% 0;
        }

        .ibdp-date {
        font-size: 14px;
    }
    }
</style>
