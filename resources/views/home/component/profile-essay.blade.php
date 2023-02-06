<div class="container-fluid position-relative overflow-hidden" id="profile-essay">
    <img src="{{asset('img/asset 1.svg')}}" alt="" class="position-absolute d-md-inline-block d-none slide-fwd-center" style="left:-10%; top:55%; width:30%;" >
    <img src="{{asset('img/asset 4.svg')}}" alt="" class="position-absolute d-md-inline-block d-none slide-fwd-center" style="right:-15%; bottom:0%; width:25%;" >
    <div class="container h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-md-9 col-12">
                <div class="row align-items-end">
                    <div class="col-md-5">
                        <img src="{{ asset('img/essay-speaker.svg') }}" alt="" class="w-100">
                    </div>
                    <div class="col-md-7">
                        <img src="{{ asset('img/essay.svg') }}" alt="" class="w-100">
                    </div>
                    <div class="col-md-12 text-center text-essay">
                        Submit your profile and write an essay on a given prompt and earn the chance to be reviewed
                        by our mentors directly! Selected profiles will get the chance to receive a free mentoring
                        session.

                        In addition, we will also share how we guide our mentees to boost their CVs through personal
                        projects, competitions, club activities, and many more!

                        *Submitted profiles will be reviewed anonymously
                    </div>
                    <div class="col-md-12 text-center title-profile my-5">
                        GET A CHANCE TO WIN
                    </div>

                </div>
            </div>
            <div class="col-md-12 mb-5">
                <div class="row align-items-center g-1">
                    <div class="col text-center" id="prize1">
                        <img src="{{ asset('img/prize-1.svg') }}" alt="" class="img-prize"
                            onmouseover="prizeActive(1)">
                    </div>
                    <div class="col text-center" id="prize2">
                        <img src="{{ asset('img/prize-2.svg') }}" alt="" class="img-prize active"
                            onmouseover="prizeActive(2)">
                    </div>
                    <div class="col text-center" id="prize3">
                        <img src="{{ asset('img/prize-3.svg') }}" alt="" class="img-prize"
                            onmouseover="prizeActive(3)">
                    </div>
                </div>
            </div>
            <div class="col-md-12 text-center mt-5">
                <div class="title-profile">
                    TIMELINE
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6 col-12">
                        <div class="card mb-2 profile-timeline bg-primary">
                            <div class="card-body text-start py-1">
                                <div class="row align-items-center">
                                    <div class="col-4">
                                        3 March
                                    </div>
                                    <div class="col-8">
                                        Open registration
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-2 profile-timeline bg-danger">
                            <div class="card-body text-start py-1">
                                <div class="row align-items-center">
                                    <div class="col-4">
                                        25 March
                                    </div>
                                    <div class="col-8">
                                        Submission deadline
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-2 profile-timeline bg-primary">
                            <div class="card-body text-start py-1">
                                <div class="row align-items-center">
                                    <div class="col-4">
                                        15 April
                                    </div>
                                    <div class="col-8">
                                        Announcement at ANNIFEST 2023
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 text-center mt-5">
                <div class="title-profile">
                    WRITE AND SUBMIT YOUR ESSAY<br> FROM THESE PROMPTS!
                </div>
                <div class="row justify-content-center mt-3">
                    <div class="col-md-8 col-11">
                        <div class="card profile-card mb-3">
                            <div class="card-header bg-primary text-white">
                                <strong>
                                    Undergraduate
                                </strong>
                            </div>
                            <div class="card-body text-start px-md-5">
                                <ul>
                                    <li>
                                        Think about an activity or experience that has helped you grow. What lessons did you
                                        learn from it, and how will these lessons help you pursue your future goals?
                                    </li>
                                    <li>
                                        Subject and major that you are interested in and why? How you’ve demonstrated this and
                                        what are your plans to do next?
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="card profile-card mb-3">
                            <div class="card-header bg-primary text-white">
                                <strong>
                                    Graduate
                                </strong>
                            </div>
                            <div class="card-body text-start px-md-5">
                                <p>
                                    Describe your reasons for applying for graduate studies programs succinctly. You should
                                    touch on the following three topics:
                                </p>
                                <ul>
                                    <li>
                                        Why you? What are your goals, research interests, future career plans, backgrounds,
                                        and/or experiences that drove you to pursue graduate studies?
                                    </li>
                                    <li>
                                        Why this program?  What universities are you thinking of applying to? What aspects of
                                        the program(s) have led you to apply?
                                    </li>
                                    <li>
                                        Why now?
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <button class="btn btn-lg btn-warning px-4 text-dark">
                            <strong>
                                Submit Your Profile & Essay Here
                            </strong>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function prizeActive(id) {
        $('.img-prize').removeClass('active')
        $('#prize' + id + ' .img-prize').addClass('active')
    }
</script>
<style>
    #profile-essay {
        height: auto;
        padding: 3% 0;
    }

    .text-essay {
        font-size: 1.3em;
    }

    .title-profile {
        font-family: 'SF Pro Display Bold';
        font-weight: bold;
        font-size: 2em;
        line-height: 1.1;
    }

    .img-prize {
        transition: all 0.5s ease-in-out;
        width: 82%;
        border: 3px solid #fff;
        border-radius: 5px;
    }

    .img-prize.active {
        transform: scale(1.4)
    }

    .profile-timeline .card-body {
        font-size: 1.2em;
        font-weight: bold;
        color: white;
    }

    .profile-card,
    .profile-card .card-header,
    .profile-card .card-body {
        font-size: 16px;
        border-radius: 0;
    }
    
</style>
