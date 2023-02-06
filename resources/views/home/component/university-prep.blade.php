<div class="container-fluid h-100 position-relative overflow-hidden" id="uni-prep">
    <img loading="lazy" src="{{asset('img/asset 2.svg')}}" alt="" class="position-absolute d-md-inline-block d-none slide-fwd-center" style="right:-4%; bottom:0%; width:15%;" >
    <div class="row justify-content-center align-items-center h-100">
        <div class="col-md-7 col-12">
            <img loading="lazy" src="{{ asset('img/uni prep.svg') }}" alt="" class="w-100">
        </div>
        <div class="col-md-9 col-12">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="bg-primary py-2 text-center text-white">
                        <strong>
                            15 APRIL 2023
                        </strong>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="bg-primary py-2 text-center text-white">
                        <strong>
                            09.00 AM - 03.00 PM WIB
                        </strong>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 mt-3 text-center">
            <img loading="lazy" src="{{ asset('img/uni talk1.svg') }}" alt="" class="w-100 my-2">
            <img loading="lazy" src="{{ asset('img/uni talk2.svg') }}" alt="" class="w-100 my-2">
            <img loading="lazy" src="{{ asset('img/uni talk3.svg') }}" alt="" class="w-100 my-2">
            <img loading="lazy" src="{{ asset('img/uni talk4.svg') }}" alt="" class="w-100 my-2">

            <a href="{{ url('/register') }}" class="btn btn-lg btn-warning py-1 text-dark px-4 mt-3 text-uppercase">
                <strong>
                    Register Now
                </strong>
            </a>
        </div>
    </div>
</div>
<style>
    #uni-prep {
        height: auto;
        padding: 5% 0;
    }
</style>
