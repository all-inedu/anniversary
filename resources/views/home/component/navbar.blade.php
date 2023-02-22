<nav class="navbar navbar-expand-lg bg-transparent fixed-top" id="navbar_allin" style="z-index:9999 !important">
    <div class="container">
        <a class="navbar-brand" href="{{url('/')}}" style="width: 15%">
            <img src="{{ asset('img/home/logo.png') }}" alt="ALL-in Eduspace" style="width: 90px">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0 fw-bolder">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/#home') }}" id="home-menu">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/#ibdp') }}" id="ibdp-menu">IBDP</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('scholarship') ? 'active' : '' }}"
                        href="{{ url('/scholarship') }}">Scholarship </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/#profile-essay') }}" id="profile-essay-menu">Profile & Essay
                        Submission</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/#university') }}" id="university-menu">University Session &
                        Talk</a>
                </li>
            </ul>
            <div class="d-lg-none d-block text-center" style="w-100">
                <a href="https://linktr.ee/allineduspacecontact" target="_blank" class="btn btn-danger fw-bold">
                    <i class="bi bi-telephone me-2"></i>
                    Contact Us
                </a>
            </div>
        </div>
        <div class="d-lg-flex d-none justify-content-end" style="width: 15%">
            <a href="https://linktr.ee/allineduspacecontact" target="_blank" class="btn btn-danger fw-bold">
                <i class="bi bi-telephone me-2"></i>
                Contact Us
            </a>
        </div>
    </div>
</nav>

<script>
    $(document).ready(function() {
        $('.nav-item a').click(function() {
            $('.nav-item a').removeClass('active')
            setTimeout(() => {
                check_menu()
            }, 50);
        });
    });

    function check_menu() {
        let hash = window.location.hash;
        $(hash + '-menu').addClass('active')
    }

    check_menu()

    $(window).scroll(function(event) {
        let scroll = $(window).scrollTop();
        if (scroll > 50) {
            $('#navbar_allin').removeClass('bg-transparent').addClass('bg-light shadow active')
        } else {
            $('#navbar_allin').removeClass('bg-light shadow active').addClass('bg-transparent')
        }
        // Do something
    });
</script>

<style>
    #navbar_allin {
        transition: all 0.3s ease-in-out;

    }

    #navbar_allin.active .navbar-nav .nav-link {
        color: #FAAF40;
    }

    .navbar-nav {
        gap: 20px;
    }

    .nav-link {
        transition: all 0.2s ease-in-out;
        font-weight: 600;
    }

    .nav-link.active {
        background: var(--bs-blue);
        color: white !important;
    }

    @media only screen and (max-width: 800px) {
        .navbar-nav {
            margin-top: 20px;
            gap: 5px;
            height: 80vh;
        }

        .nav-link {
            padding: 5px 10px;
        }

    }

    @media only screen and (max-width: 1100px) {
        .navbar, .bg-transparent {
            background: white !important;
        }
    }
</style>
