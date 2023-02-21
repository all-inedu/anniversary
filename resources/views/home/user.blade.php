@extends('app')
@section('body')
    @include('home.component.navbar')

    <div class="container" id="user">
        <div class="row g-3">
            <div class="col-md-4">
                <div class="card shadow border-0 mb-3">
                    <div class="card-body text-center">
                        <img src="{{ asset('img/user.png') }}" alt="" class="w-25 mb-3">
                        <h5>Hi, {{ $client->fullname }}</h5>
                        <small>
                            You can update your seat and meet the world’s top university representatives
                        </small>
                    </div>
                </div>

                <div class="card border-0 shadow">
                    <div class="card-body">
                        <ul class="list-group list-group-flush overflow-auto" id="uni_box" style="max-height: 300px">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                University Name
                                <div class="">
                                    <i class="bi bi-trash2 text-danger" style="cursor: pointer;"></i>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="row row-cols-md-4 row-cols-2 g-md-3 g-1 overflow-auto" style="height:70vh">
                            @foreach ($universities as $university)
                                <div class="col">
                                    <div class="shadow position-relative uni-box-select w-100">
                                        <input type="checkbox"
                                            class="position-absolute top-0 left-0 uni-select input-{{ $university->uuid }}"
                                            id="uni_{{ $loop->iteration }}" value="{{ $university->uuid }}"
                                            data-uni="{{ $university }}" onchange="select_uni('{{ $loop->iteration }}')">
                                        <span class="checkmark"></span>
                                        <label for="uni_{{ $loop->iteration }}" class="d-block" style="cursor: pointer"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Choose this university">
                                            <div style="min-height:150px; max-height: 150px;"
                                                class="bg-light overflow-hidden d-flex align-items-center">
                                                <img src="{{ isset($university->thumbnail) ? asset('storage/' . $university->thumbnail) : 'https://lightwidget.com/wp-content/uploads/local-file-not-found-480x488.png' }}"
                                                    onerror="this.onerror=null; this.src='https://lightwidget.com/wp-content/uploads/local-file-not-found-480x488.png'"
                                                    alt="" class="uni-thumbnail">
                                            </div>
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
                                                <img src="{{ asset('img/uni/BOOKED.webp') }}" alt=""
                                                    class="w-100">
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
    </div>

    <!-- Questions Modal -->
    <div class="modal fade" id="questions_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">University Info Session</h1>
                    <button class="btn btn-sm btn-light" data-bs-dismiss="modal" id="close_button"><i class="bi bi-x"></i></button>
                </div>
                <div class="modal-body">
                    <input type="text" id="uni_id" hidden>
                    <input type="text" name="" id="uni_name" hidden>
                    <input type="text" name="" id="uni_link" hidden>
                    <input type="text" name="" id="uni_password" hidden>
                    <label for="" class="d-block">
                        Question for the University
                    </label>
                    <small class="text-primary">Drop your question(s) for the university representatives (not
                        mandatory)</small>
                    <textarea name="" cols="30" rows="5" class="form-control" id="uni_questions"></textarea>
                </div>
                <div class="modal-footer d-flex justify-content-end align-items-center">
                    <button type="button" class="btn btn-secondary without-questions" data-bs-dismiss="modal"
                        onclick="submit_question(false)"><i class="bi bi-x"></i> Without Questions</button>
                    <button type="button" class="btn btn-primary with-questions" onclick="submit_question(true)"><i
                            class="bi bi-send"></i> Submit Questions</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        // AXIOS HERE 
        // Insert Array From Controller to localStorage.setItem('uni' json_strngfy(array))
        const selected_uni = new Array()
        @if (isset($booked_universities))
            @foreach ($booked_universities as $university)
                selected_uni.push({
                    'id': '{{ $university->uuid }}',
                    'name': '{{ $university->name }}',
                    'questions': '{{ $university->pivot->question }}',
                    'link': '{{ $university->link }}',
                    'password': '{{ $university->password }}'
                })
            @endforeach
        @endif
        localStorage.setItem('uni', JSON.stringify(selected_uni))

        $("#uni_questions").on('keyup', function(e) {
            var val = $(this).val();
            if (val != null && val != '') {
                $(".without-questions").hide();
                $(".with-questions").show();
            } else {
                $(".without-questions").show();
                $(".with-questions").hide();
            }
        })

        function submit_question(status) {
            // select_uni()
            let uni_checked = localStorage.getItem('uni') ? JSON.parse(localStorage.getItem('uni')) : []

            // Add Questions 
            let uni_id = $('#uni_id').val()
            let uni_name = $('#uni_name').val()
            let uni_questions = status ? $('#uni_questions').val() : ''
            let uni_link = $('#uni_link').val()
            let uni_password = $('#uni_password').val()

            if (uni_checked.length > 0) {
                let uni_index = uni_checked.findIndex(uni => uni.id === uni_id)
                if (uni_index >= 0) {
                    uni_checked[uni_index].id = uni_id
                    uni_checked[uni_index].name = uni_name
                    uni_checked[uni_index].questions = uni_questions
                    uni_checked[uni_index].link = uni_link
                    uni_checked[uni_index].password = uni_password
                } else {
                    let arr = {
                        'id': uni_id,
                        'name': uni_name,
                        'questions': uni_questions,
                        'link': uni_link,
                        'password': uni_password
                    }
                    uni_checked.push(arr)
                }
            } else {
                let arr = {
                    'id': uni_id,
                    'name': uni_name,
                    'questions': uni_questions,
                    'link': uni_link,
                    'password': uni_password
                }
                uni_checked.push(arr)
            }

            // Reinitiate Uni Session 
            localStorage.setItem('uni', JSON.stringify(uni_checked))

            $('#uni_id').val('')
            $('#uni_name').val('')
            $('#uni_questions').val('')
            $('#uni_link').val('')
            $('#uni_password').val('')
            $('#questions_modal').modal('hide')
            let message = status ? 'with questions' : 'without questions'
            // toast('success', 'University info session successfully booked ' + message)

            // AXIOS HERE ...
            // Update book uni info session from localStorage  

            axios.put("{{ route('user.update.profile', ['uuid' => Request::route('uuid')]) }}", {
                booked: JSON.parse(localStorage.getItem('uni')),
                _token: '{{ csrf_token() }}',
                _method: 'put',
            }).then(function(response) {
                console.log(response)
                notification('success', response.data.message)
            }).catch(function(error) {
                console.log(error)
                notification('error', error.data.message)
            })


            check_uni()
        }

        function tooltip() {
            const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
            const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
        }

        function check_uni() {
            let uni_select = localStorage.getItem('uni') ? JSON.parse(localStorage.getItem('uni')) : []
            let uni_length = $('.uni-select').length

            for (let i = 1; i <= uni_length; i++) {
                $('#uni_' + i).prop('checked', false)
                $('.overflow-' + i).addClass('d-none')
            }

            // Check Booking
            for (let i = 1; i <= uni_length; i++) {
                let value = $('#uni_' + i).val()
                for (let x = 0; x < uni_select.length; x++) {
                    if (value == uni_select[x].id) {
                        $('#uni_' + i).prop('checked', true)
                        $('#uni_' + i).siblings('label').attr('data-bs-title', 'Cancel this university')
                        tooltip()
                        $('.overflow-' + i).removeClass('d-none')
                    }
                }
            }

            // Uni Box  List
            if (uni_select.length > 0) {
                $('#uni_box').html('')
            } else {
                $('#uni_box').html('No Bookings Yet')
            }

            uni_select.forEach((uni, x) => {
                let data = JSON.stringify(uni_select[x])
                $('#uni_box').append(
                    '<li class="list-group-item">' +
                    '<div class="d-flex justify-content-between align-items-center">' +
                    uni.name +
                    '<div class="">' +
                    '<i id="question_' + x +
                    '" class="bi bi-patch-question text-primary me-2" style="cursor: pointer"' +
                    'onclick="edit_uni(' + x +
                    ')" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add or edit your question(s)"></i>' +
                    '<i class="bi bi-trash2 text-danger" style="cursor:pointer" onclick="delete_uni(\'' + uni
                    .id + '\')" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Cancel"></i>' +
                    ' </div>' +
                    '</div>' +
                    '<div class="d-flex justify-content-between align-items-center">' +
                    '<small class="text-muted"><i class="bi bi-link me-1"></i>  <a href="' + uni.link +
                    '" class="text-decoration-none text-muted" target="_blank">Join Now</a></small>' +
                    '<small class="text-muted"><i class="bi bi-key me-1"></i> ' + uni.password + '</small>' +
                    '</li>'
                )
                $('#question_' + x).attr('data-info', data);
            });
            tooltip()
        }

        function check(element) {
            var isChecked = $(element).prop('checked')
            if (isChecked == true)
                $('#questions_modal').modal('show')
        }

        function select_uni(id = null) {
            let uni_select = localStorage.getItem('uni') ? JSON.parse(localStorage.getItem('uni')) : []
            let uni_checked = []

            let uni_length = $('.uni-select').length
            let checked = $('.uni-select').is(":checked")
            // let uni_id =  $('#uni_'+id).val()

            $('#uni_list').html('');
            // Add Questions 
            if (id) {
                let uni_id = $('#uni_' + id).is(":checked")
                if (uni_id) {
                    let univ = $('#uni_' + id).data('uni')
                    $('#questions_modal').modal('show')
                    $('#staticBackdropLabel').html(univ.name)
                    $('#uni_id').val($('#uni_' + id).val())
                    $('#uni_name').val(univ.name)
                    $('#uni_link').val(univ.link)
                    $('#uni_password').val(univ.password)
                    $('#close_button').attr('onclick', 'cancel(\'' + $('#uni_' + id).val() + '\')')
                    $(".without-questions").show();
                    $(".with-questions").hide();
                } else {
                    let uni_index = uni_select.findIndex(uni_id => uni_id.id === $('#uni_' + id).val());

                    if (uni_index === -1) {
                        console.log('id not found');
                    } else {
                        $('.overflow-' + uni_select[uni_index].id).addClass('d-none')
                        delete_uni(uni_select[uni_index].id)
                    }

                }
            }
        }

        function cancel(id) {
            $('.input-' + id).prop('checked', false)
            $('#uni_id').val('')
            $('#uni_name').val('')
            $('#uni_questions').val(null)
            $('#uni_link').val('')
            $('#uni_password').val('')
            $('#univ_modal').modal('show')
        }

        function edit_uni(id) {
            let uni = $('#question_' + id).data('info')
            console.log(uni);
            // Add Questions 
            $('#questions_modal').modal('show')
            $('#uni_title').html(uni.name)
            $('#uni_id').val(uni.id)
            $('#uni_name').val(uni.name)
            $('#uni_type').val('edit')
            $('#uni_questions').val(uni.questions)
            if (uni.questions) {
                $(".without-questions").hide();
                $(".with-questions").show();
            }
        }

        function delete_uni(id) {

            Swal.fire({
                title: 'Are you sure?',
                text: "You want to cancel this university info session",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#233872',
                cancelButtonColor: '#BE1E2D',
                confirmButtonText: 'Yes, Cancel!',
                cancelButtonText: 'No',
            }).then((result) => {
                if (result.isConfirmed) {

                    $('.input-' + id).siblings('label').attr('data-bs-title', 'Choose this university')
                    let uni_select = localStorage.getItem('uni') ? JSON.parse(localStorage.getItem('uni')) : null
                    let myArray = uni_select.filter(function(obj) {
                        return obj.id !== id;
                    });
                    
                    localStorage.setItem('uni', JSON.stringify(myArray))
                    check_uni()
                    select_uni()

                    // AXIOS HERE ...
                    // Update book uni info session from localStorage
                    var link = "{{ url('/') }}/user/" + '{{ $client->uuid }}'
                    
                    axios.put(link, {
                        booked: JSON.parse(localStorage.getItem('uni')),
                        _token: '{{ csrf_token() }}',
                        _method: 'put',
                    }).then(function(response) {
                        notification('success', response.data.message)
                    }).catch(function(error) {
                        notification('error', error.data.message)
                    })
                } else {
                    $('.input-' + id).prop('checked', true)
                    $('.input-' + id).siblings('label').attr('data-bs-title', 'Cancel this university')
                    $('.overflow-' + id).removeClass('d-none')
                }
                tooltip()
            })
        }

        check_uni()
        select_uni()
    </script>

    <style>
        #user {
            padding: 7% 0;
        }

        .book-overflow {
            position: absolute;
            background: rgba(33, 33, 33, 0.721);
            height: 100%;
            width: 100%;
            top: 0;
            z-index: 1055;
            # default 1056
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
    </style>
    @include('home.component.footer')
@endsection
