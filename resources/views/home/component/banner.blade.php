<div class="container-fluid position-relative overflow-hidden" id="home">
    <img src="{{ asset('img/asset 2.svg') }}" alt="" class="position-absolute d-md-inline-block d-none rotate"
        style="left:-13%; top:40%;">
    <img src="{{ asset('img/asset 3.svg') }}" alt=""
        class="position-absolute d-md-inline-block d-none slide-fwd-center" style="right:-8%; top:-25%;">
    <div class="container text-center position-relative">
        {{-- IMAGE  --}}
        <img src="{{ asset('img/home/Free event.webp') }}" alt=""
            class="position-absolute slide-fwd-center asset-1">
        <img src="{{ asset('img/home/Online.webp') }}" alt=""
            class="position-absolute slide-fwd-center asset-2">

        <img src="{{ asset('img/home/Grade.webp') }}" alt="" class="position-absolute slide-fwd-center asset-3">
        <img src="{{ asset('img/home/Masters applicant.webp') }}" alt=""
            class="position-absolute slide-fwd-center asset-4">
        {{-- END IMAGE  --}}


        <div class="row justify-content-center">
            <div class="col-lg-9 col-12">
                <img src="{{ asset('img/home/Logo-tagline.webp') }}" alt=""
                    class="slide-fwd-center banner-image">
            </div>
            <div class="col-lg-9 col-12 mt-md-5 mt-3">
                <div class="row justify-content-center align-items-end g-md-5 g-1 row-cols-md-3 row-cols-2">
                    <div class="col">
                        <a href="#ibdp">
                            <img src="{{ asset('img/home/Stage 1.webp') }}" alt=""
                                class="banner-stage slide-bottom-top">
                        </a>
                    </div>
                    <div class="col">
                        <a href="#profile-essay">
                            <img src="{{ asset('img/home/Stage 2.webp') }}" alt=""
                                class="banner-stage slide-bottom-top" style="width: 100%">
                        </a>
                    </div>
                    <div class="col">
                        <a href="#university">
                            <img src="{{ asset('img/home/Stage 3.webp') }}" alt=""
                                class="banner-stage slide-bottom-top" style="width:82%">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('.banner-stage').on('mouseenter mouseleave', function(e) {
        var animate = e.type == 'mouseenter' ? 'slide-bottom-top' : '';
        if (e.type == 'mouseenter') {
            $(this).removeClass('slide-bottom-top')
        } else {
            $(this).addClass('slide-bottom-top')
        }
    });
</script>
<style>
    #home {
        min-height: 100vh;
        padding-top: 7%;
        padding-bottom: 50px;
    }

    .banner-image {
        width: 90%;
    }

    .banner-stage {
        cursor: pointer;
        width: 68%;
    }

    .asset-1 {
        left: 0%;
        top: 0%;
        width: 170px;
    }

    .asset-2 {
        left: 0%;
        top: 10%;
        width: 170px;
    }

    .asset-3 {
        right: 0%;
        top: 0%;
        width: 170px;
    }

    .asset-4 {
        right: 0%;
        top: 10%;
        width: 160px;
    }

    @media only screen and (max-width: 600px) {
        #home {
            height: auto !important;
            padding-top: 130px;
            padding-bottom: 30px;
        }

        .banner-image {
            width: 100%;
        }

        .asset-1 {
            left: -5%;
            top: -70px;
            width: 90px;
        }

        .asset-2 {
            left: -5%;
            top: -40px;
            width: 90px;
        }

        .asset-3 {
            right: -5%;
            top: -70px;
            width: 90px;
        }

        .asset-4 {
            right: -5%;
            top: -40px;
            width: 80px;
        }
    }

    @media only screen and (min-width: 600px) and (max-width: 1100px) {
        #home {
            height: auto;
            padding-top: 140px;
            padding-bottom: 0px;
        }

        .banner-image {
            width: 100%;
        }

        .asset-1 {
            left: -5%;
            top: -80px;
            width: 130px;
        }

        .asset-2 {
            left: -5%;
            top: -40px;
            width: 130px;
        }

        .asset-3 {
            right: -5%;
            top: -80px;
            width: 130px;
        }

        .asset-4 {
            right: -5%;
            top: -40px;
            width: 120px;
        }
    }
</style>
