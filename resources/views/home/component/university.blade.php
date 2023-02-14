<div class="container-fluid position-relative overflow-hidden" id="university">
    <img src="{{ asset('img/asset 4.svg') }}" alt=""
        class="position-absolute d-md-inline-block d-none slide-fwd-center" style="left:-12%; top:55%; width:20%;">
    <img src="{{ asset('img/asset 3.svg') }}" alt=""
        class="position-absolute d-md-inline-block d-none slide-fwd-center" style="right:-6%; bottom:0%; width:15%;">
    <div class="container h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-md-7 col-11" data-aos="fade-up">
                <img src="{{ asset('img/uni/uni.webp') }}" alt="" class="w-100">
            </div>
            <div class="col-md-9 col-11" data-aos="fade-up">
                <div class="subtitle-uni text-center">
                    Book your seat and meet the world’s top university representatives, curated by ALL-in
                </div>
            </div>
            <div class="col-md-11 col-10 mt-5" data-aos="fade-up">
                <div class="row row-cols-md-4 row-cols-1 g-3 justify-content-center univ-box">
                    @foreach ($universities as $university)
                        <div class="col">
                            <div class="shadow position-relative uni-box-select w-100">
                                <input type="checkbox"
                                    class="position-absolute top-0 left-0 uni-select input-{{ $university->uuid }}"
                                    id="uni_{{ $loop->iteration }}" value="{{ $university->uuid }}"
                                    data-uni="{{ $university->name }}" onchange="select_uni('{{ $loop->iteration }}')">
                                <span class="checkmark"></span>
                                <label for="uni_{{ $loop->iteration }}" class="d-block" style="cursor: pointer">
                                    <img src="{{ isset($university->thumbnail) ? asset('storage/'.$university->thumbnail) : 'https://lightwidget.com/wp-content/uploads/local-file-not-found-480x488.png' }}"
                                        alt="" class="w-100">
                                    <div class="uni-box d-flex justify-content-between">
                                        <div class="">{{ date('d F', strtotime($university->session_start)) }}
                                        </div>
                                        <div class="">{{ date('h.i A', strtotime($university->time_start)) }}
                                        </div>
                                    </div>

                                    <div
                                        class="book-overflow overflow-{{ $loop->iteration }} overflow-{{ $university->uuid }} d-none">
                                    </div>
                                    <h3
                                        class="text-overflow overflow-{{ $loop->iteration }} overflow-{{ $university->uuid }} d-none">
                                        <img src="{{ asset('img/uni/BOOKED.webp') }}" alt="" class="w-100">
                                    </h3>
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Questions Modal -->
<div class="modal fade" id="questions_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">University Info Session</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="text" id="uni_id" hidden>
                <input type="text" name="" id="uni_name" hidden>
                <label for="" class="d-block">
                    Question for the University
                </label>
                <small class="text-primary">Drop your question(s) for the university representatives (not
                    mandatory)</small>
                <textarea name="" cols="30" rows="5" class="form-control" id="uni_questions"></textarea>
            </div>
            <div class="modal-footer d-flex justify-content-between align-items-center">
                <button type="button" class="btn btn-secondary without-questions" data-bs-dismiss="modal"
                    onclick="submit_question(false)"><i class="bi bi-x"></i> Without Questions</button>
                <button type="button" class="btn btn-primary" onclick="submit_question(true)"><i
                        class="bi bi-send"></i> Submit Questions</button>
            </div>
        </div>
    </div>
</div>

{{-- sticky-bottom  --}}
<div class="container-fluid position-fixed bottom-0 left-0 w-100 uni-check d-flex justify-content-between align-items-center"
    id="indicator_checked">
    <div id="uni_selected">
        <div class="d-flex align-items-center" style="font-weight: 300;">
            <div class="position-relative">
                <i class="bi bi-calendar-check text-white" style="font-size:1.7em"></i>
                <span class="position-absolute start-100 translate-middle badge rounded-pill bg-danger" style="top:3px;"
                    id="uni_count">
                    0
                </span>
            </div>
            <div class="text-white ms-2 dropup" style="cursor: pointer">
                <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside"
                    id="text_selected">
                    Selected University
                </div>
                <ul id="uni_list" class="dropdown-menu dropdown-menu-end px-2 shadow"
                    style="width:400px; font-size:15px;">
                </ul>
            </div>
        </div>
    </div>
    <div class="">
        <a href="{{ url('/register') }}" class="btn btn-warning text-uppercase text-dark">
            <div class="d-md-block d-none fw-bold">
                Register Now
                <i class="bi bi-arrow-right-circle"></i>
            </div>
            <div class="d-md-none d-block">
                <i class="bi bi-arrow-right-circle"></i>
            </div>
        </a>
    </div>
</div>

<script>
    $("#uni_questions").on('keyup', function(e) {
        var val = $(this).val();
        if (val != null && val != ''){
            $(".without-questions").hide();
        } else {
            $(".without-questions").show();
        }
    })

    function toast(status, title) {
        let Toast = Swal.mixin({
            toast: true,
            position: 'bottom-end',
            showConfirmButton: false,
            timer: 3000,
            width: 450,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: status,
            title: title,
        })
    }

    function submit_question(status) {
        let uni_checked = localStorage.getItem('uni') ? JSON.parse(localStorage.getItem('uni')) : []

        // Add Questions 
        let uni_id = $('#uni_id').val()
        let uni_name = $('#uni_name').val()
        let uni_questions = status ? $('#uni_questions').val() : ''

        if (uni_checked.length > 0) {
            let uni_index = uni_checked.findIndex(uni => uni.id === uni_id)
            if (uni_index >= 0) {
                uni_checked[uni_index].id = uni_id
                uni_checked[uni_index].name = uni_name
                uni_checked[uni_index].questions = uni_questions
            } else {
                let arr = {
                    'id': uni_id,
                    'name': uni_name,
                    'questions': uni_questions
                }
                uni_checked.push(arr)
            }
        } else {
            let arr = {
                'id': uni_id,
                'name': uni_name,
                'questions': uni_questions
            }
            uni_checked.push(arr)
        }

        $('#uni_id').val('')
        $('#uni_name').val('')
        $('#uni_questions').val('')
        $('#questions_modal').modal('hide')
        let message = status ? 'with questions' : 'without questions'
        toast('success', 'University info session successfully booked ' + message)

        localStorage.setItem('uni', JSON.stringify(uni_checked))
        check_uni()
    }

    function select_uni(id = null) {
        let uni_select = localStorage.getItem('uni') ? JSON.parse(localStorage.getItem('uni')) : []

        let uni_length = $('.uni-select').length
        let checked = $('.uni-select').is(":checked")

        // Add Questions 
        if (id) {
            let uni_id = $('#uni_' + id).is(":checked")
            if (uni_id) {
                $('#questions_modal').modal('show')
                $('#staticBackdropLabel').html($('#uni_' + id).data('uni'))
                $('#uni_id').val($('#uni_' + id).val())
                $('#uni_name').val($('#uni_' + id).data('uni'))
            } else {
                let uni_index = uni_select.findIndex(uni_id => uni_id.id === $('#uni_' + id).val());

                if (uni_index === -1) {
                    console.log('id not found');
                } else {
                    $('.overflow-' + id).addClass('d-none')
                    uni_select.splice(uni_index, 1);

                    toast('warning', 'University info session successfully canceled')
                    localStorage.setItem('uni', JSON.stringify(uni_select))
                    check_uni()
                }

            }
        }

    }

    function delete_uni(id) {
        let uni_select = localStorage.getItem('uni') ? JSON.parse(localStorage.getItem('uni')) : []
        let uni_index = uni_select.findIndex(uni_id => uni_id.id === id);

        if (uni_index === -1) {
            console.log('id not found');
        } else {
            $('.input-' + id).prop('checked', false)
            $('.overflow-' + id).addClass('d-none')
            uni_select.splice(uni_index, 1);

            toast('warning', 'University info session successfully canceled')
            localStorage.setItem('uni', JSON.stringify(uni_select))
        }

        check_uni()
    }

    function edit_uni(id) {
        let uni = $('#question_' + id).data('info')
        // console.log(uni);
        // Add Questions 
        $('#questions_modal').modal('show')
        $('#staticBackdropLabel').html(uni.name)
        $('#uni_id').val(uni.id)
        $('#uni_name').val(uni.name)
        $('#uni_questions').val(uni.questions)
    }

    function check_uni() {
        let uni_select = localStorage.getItem('uni') ? JSON.parse(localStorage.getItem('uni')) : []
        let uni_length = $('.uni-select').length
        // check uni length 
        if (uni_select.length > 0) {
            $('#indicator_checked').addClass('active')
            $('#uni_count').html(uni_select.length)
            if (uni_select.length > 1) {
                $('#text_selected').html('Universities Selected')
            } else {
                $('#text_selected').html('University Selected')
            }
        } else {
            $('#indicator_checked').removeClass('active')
        }

        $('#uni_list').html('')
        for (let i = 1; i <= uni_length; i++) {
            let value = $('#uni_' + i).val()
            for (let x = 0; x < uni_select?.length; x++) {
                if (value == uni_select[x].id) {
                    $('#uni_' + i).prop('checked', true)
                    $('.overflow-' + i).removeClass('d-none')
                    let data = JSON.stringify(uni_select[x])
                    $('#uni_list').append(
                        '<li class="d-flex justify-content-between align-items-center" >' +
                        '<div class=""><i class="bi bi-check-circle-fill text-success me-2"></i>' + uni_select[x]
                        .name + '</div>' +
                        '<div>' +
                        '<i id="question_' + x +
                        '" class="bi bi-patch-question text-info me-2" style="cursor: pointer"' +
                        'onclick="edit_uni(' + x + ')"></i>' +
                        '<i class="bi bi-trash2 text-danger" style="cursor: pointer" onclick="delete_uni(\'' +
                        uni_select[x].id + '\')"></i>' +
                        '</div>' +
                        '</li>'
                    );
                    $('#question_' + x).attr('data-info', data);
                }
            }
        }
    }

    check_uni()
</script>

<style>
    #university {
        height: auto;
        padding: 7% 0;
    }

    .subtitle-uni {
        font-size: 1.3em;
        font-weight: 400;
    }

    .book-overflow {
        position: absolute;
        background: rgba(33, 33, 33, 0.721);
        height: 100%;
        width: 100%;
        top: 0;
        z-index: 1;
    }

    .text-overflow {
        position: absolute;
        z-index: 2;
        margin: auto;
        top: 15%;
        left: 0%;
        padding: 5px 15px;
        display: inline-block;
        font-weight: bold;
    }

    .uni-box {
        padding: 10px 5px;
        background: #233872;
        font-weight: 200;
        color: white;
        font-size: 1em;
    }

    .checkmark {
        position: absolute;
        top: 0;
        left: 0;
        height: 35px;
        width: 35px;
        border-radius: 0 0 30px 0px;
        background-color: #fff;
    }

    .uni-box-select:hover input~.checkmark {
        background-color: #ccc;
    }

    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    .uni-box-select input:checked~.checkmark:after {
        display: block;
    }

    .uni-box-select .checkmark:after {
        left: 9px;
        top: 5px;
        width: 10px;
        height: 13px;
        border: solid white;
        border-width: 0 3px 3px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
    }

    .uni-box-select input:checked~.checkmark {
        background: #BE1E2D !important;
    }

    #indicator_checked {
        background: #198ABC;
        border-top: 3px groove #fff;
        padding: 0 10%;
        z-index: 99;
    }

    .uni-check {
        transition: all 0.3s ease-in-out;
        height: 0vh;
    }

    .uni-check div {
        transition: all 0.1s ease-in-out;
        display: none;
    }

    .uni-check.active {
        height: 10vh;
    }

    .uni-check.active div {
        display: block
    }

    #uni_list {
        border-radius: 5px !important;
        padding: 10px;
    }

    #uni_list li {
        border-top: 1px solid #dedede !important;
        padding: 5px 0;
    }

    #uni_list li:first-child {
        border-top: none !important;
    }

    @media only screen and (max-width: 600px) {
        #university {
            height: auto;
            padding: 8% 0;
        }

        .subtitle-uni {
            font-size: 16px;
        }

        .univ-box {
            height: 500px;
            overflow: auto;
        }

        #indicator_checked {
            padding: 0 5%;
        }
    }
</style>
