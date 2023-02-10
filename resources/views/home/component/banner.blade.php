<div class="container-fluid position-relative overflow-hidden" id="home">
    <img src="{{asset('img/asset 2.svg')}}" alt="" class="position-absolute d-md-inline-block d-none rotate" style="left:-13%; top:40%;" >
    <img src="{{asset('img/asset 3.svg')}}" alt="" class="position-absolute d-md-inline-block d-none slide-fwd-center" style="right:-8%; top:-25%;" >
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-md-9 col-12">
                    <img src="{{ asset('img/home/Logo-tagline.webp') }}" alt="" class="slide-fwd-center banner-image">
            </div>
            <div class="col-md-9 col-12 mt-md-5 mt-3">
                <div class="row justify-content-center align-items-end g-md-5 g-1 row-cols-md-3 row-cols-2">
                    <div class="col">
                        <a href="#ibdp">
                        <img src="{{ asset('img/home/Stage 1.webp') }}" alt="" class="banner-stage slide-bottom-top">
                        </a>
                    </div>
                    <div class="col">
                        <a href="#profile-essay">
                        <img src="{{ asset('img/home/Stage 2.webp') }}" alt="" class="banner-stage slide-bottom-top"
                            style="width: 100%">
                        </a>
                    </div>
                    <div class="col">
                        <a href="#university">
                            <img src="{{ asset('img/home/Stage 3.webp') }}" alt="" class="banner-stage slide-bottom-top" style="width:82%">
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
        height: 100vh;
        padding-top: 7%;

    }

    .banner-image {
        width: 90%;
    }

    .banner-stage {
        cursor: pointer;
        width: 68%;
    }

    @media only screen and (max-width: 600px) {
        #home {
            height: auto;
            padding-top: 30%;
            padding-bottom: 50px;
        }
        .banner-image {
        width: 100%;
    }
    }
</style>
