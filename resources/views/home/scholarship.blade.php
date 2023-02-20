@extends('app')
@section('body')
    @include('home.component.navbar')
    <div class="container-fluid" id="scholarship">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-2 col-4 text-md-end text-center">
                    <img src="{{ asset('img/home/logo.png') }}" alt="" class="w-75">
                </div>
                <div class="col-md-6 col-11">
                    <img src="{{ asset('img/scholarship/Scholarships.webp') }}" alt="" class="w-100">
                </div>
                <div class="col-md-8 col-11">
                    <h4 class="fw-bold text-center">
                        We always encourage you to <span class="text-warning">DARE TO DREAM </span> , and we try our best to
                        make everyone’s dreams come true through education.
                    </h4>
                </div>
                <div class="col-md-8 col-11 mt-3">
                    <div class="row row-cols-md-2 row-cols-1 g-md-2 g-3">
                        <div class="col">
                            <img src="{{ asset('img/scholarship/scholarship_am.webp') }}" alt="" class="w-100">
                            <a href="https://forms.gle/kbBAfemjG1gm9HoR8" target="_blank"
                                class="btn btn-lg btn-block w-100 btn-warning mt-3 text-dark fw-bold">APPLY NOW</a>
                        </div>
                        <div class="col">
                            <img src="{{ asset('img/scholarship/scholarship_pm.webp') }}" alt="" class="w-100">
                            <a href="https://bit.ly/Profile-Essay_Submission2023" target="_blank"
                                class="btn btn-lg btn-block w-100 btn-warning mt-3 text-dark fw-bold">APPLY NOW</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 mt-3">
                    <div class="scholarship-title">
                        TIMELINE
                    </div>

                    <div class="card mb-2 scholarship-timeline bg-primary">
                        <div class="card-body text-start py-1">
                            <div class="row align-items-center">
                                <div class="col-4">
                                    3 March
                                </div>
                                <div class="col-8">
                                    Open submission
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-2 scholarship-timeline bg-danger">
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

                    <div class="card mb-2 scholarship-timeline bg-primary">
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

                <div class="col-md-8 mt-3">
                    <div class="scholarship-title">
                        FAQ
                    </div>
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button bg-primary text-white fw-normal" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq_1" aria-expanded="true"
                                    aria-controls="faq_1">
                                    Who is eligible for the scholarship?
                                </button>
                            </h2>
                            <div id="faq_1" class="accordion-collapse collapse show">
                                <div class="accordion-body">
                                    This ALL-in Admission Mentoring Scholarship is for grade 11 students, while the Passion
                                    Project Mentoring Scholarship is for grade 10 and 11 students.
                                    <p>
                                        Applicants must submit all required documents to be eligible.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button bg-primary text-white fw-normal collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq_2" aria-expanded="false"
                                    aria-controls="faq_2">
                                    How to apply?
                                </button>
                            </h2>
                            <div id="faq_2" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    Click on this LINK, but make sure all documents needed are ready to attach.
                                    Or you can click the submit document button at the bottom of this page.

                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button bg-primary text-white fw-normal collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq_3" aria-expanded="false"
                                    aria-controls="faq_3">
                                    What are the requirements?
                                </button>
                            </h2>
                            <div id="faq_3" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    ALL-in Admission Mentoring Scholarship:
                                    The program is eligible for students in grade 11. As for rules, we have set requirements
                                    that include:
                                    <ul>
                                        <li>
                                            Academic transcript Grade 9 onwards
                                        </li>
                                        <li>
                                            UN/ IGCSE Report
                                        </li>
                                        <li>
                                            Letter of recommendation (1 teacher)
                                        </li>
                                        <li>
                                            Personal Statement
                                        </li>
                                        <li>
                                            Bank statement (in the last 3 months
                                        </li>
                                        <li>
                                            Activity resume (on application form)
                                        </li>
                                    </ul>

                                    Passion Project Mentoring Scholarship:
                                    The program is eligible for students in grade 10 and 11. As for rules, we have set
                                    requirements that include:
                                    <ul>
                                        <li>
                                            Essay or personal statement based on prompts given 
                                        </li>
                                        <li>
                                            Bank statement (in the last 3 months)
                                        </li>
                                        <li>
                                            Activity resume (on application form)
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button bg-primary text-white fw-normal collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq_4" aria-expanded="false"
                                    aria-controls="faq_4">
                                    What happens after the deadline?
                                </button>
                            </h2>
                            <div id="faq_4" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    You will be called for an interview if you are shortlisted as a potential scholarship
                                    winner.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button bg-primary text-white fw-normal collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq_5" aria-expanded="false"
                                    aria-controls="faq_5">
                                    When will the scholarship be announced?
                                </button>
                            </h2>
                            <div id="faq_5" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    The scholarship awardee will be announced through Annifest Main Event on April 15th
                                    2023. The scholarship grant letter will be sent by email.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style scoped>
        #scholarship {
            padding: 7% 0;
        }

        .scholarship-title {
            font-size: 2em;
            line-height: 1.1;
            text-align: center;
            margin: 5% 0 2% 0;
            font-weight: 900;
        }

        .scholarship-timeline {
            font-size: 1.2em;
            color: white;
        }

        .accordion-button {
            box-shadow: none !important;
            outline: none !important;
        }

        @media only screen and (max-width: 600px) {
            #scholarship {
            padding-top: 30%;
        }
        }
    </style>
    @include('home.component.footer')
@endsection
