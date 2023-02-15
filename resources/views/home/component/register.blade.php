<div class="container-fluid" id="register">
    <div class="container min-vh-100">
        <div class="row">
            <div class="col-md-7">
                <div class="bg-primary p-4 shadow text-white rounded">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <h4 class="text-warning fw-bold">Fill The Information</h4>
                    <hr>
                    <form action="{{ route('register.store') }}" id="register_form" method="POST" class="mb-3">
                        @csrf
                        <textarea name="uni_select" id="uni_textarea" hidden></textarea>
                        <section class="active" id="section_1">
                            <div class="row g-2">
                                <div class="col-md-6 mb-2">
                                    <label for="">Full Name</label>
                                    <input type="text" name="fullname" class="form-control field field-1"
                                        placeholder="Full Name" id="name" onchange="is_filled('name')" value="{{ old('fullname') }}">
                                    <small class="text-warning"></small>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="">Phone Number</label>
                                    <input type="tel" name="phone_number" class="form-control field field-3"
                                        placeholder="Phone Number" id="phone" onchange="validatePhoneNumber()" value="{{ old('phone_number') }}">
                                    <small class="text-warning"></small>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="">Email Address</label>
                                    <input type="email" name="email_address" class="form-control field field-2"
                                        placeholder="Email" id="email" onchange="validate_email()" value="{{ old('email_address') }}">
                                    <small class="text-warning"></small>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="">Confirm Email</label>
                                    <input type="email" name="email_confirm" class="form-control "
                                        placeholder="Confirm Email" id="confirm_email" onchange="confirmEmail()" value="{{ old('email_confirm') }}">
                                    <small class="text-warning"></small>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="">Address</label>
                                    <textarea name="address" cols="30" rows="5" class="form-control field field-4" id="address"
                                        onchange="is_filled('address')">{{ old('address') }}</textarea>
                                    <small class="text-warning"></small>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="">You are a</label>
                                    <div class="d-flex">
                                        <div class="position-relative mx-1">
                                            <input type="radio" name="role" id="student" value="student"
                                                class="radio-register" @if (old('role') == "student") checked @elseif (!old('role')) checked @endif>
                                            <label for="student" class="">
                                                <div class="radio-box">
                                                    Student
                                                </div>
                                            </label>
                                        </div>
                                        <div class="position-relative mx-1">
                                            <input type="radio" name="role" id="parent" value="parent"
                                                class="radio-register">
                                            <label for="parent" class="">
                                                <div class="radio-box" @if (old('role') == "parent") checked @endif>
                                                    Parent
                                                </div>
                                            </label>
                                        </div>
                                        <div class="position-relative mx-1">
                                            <input type="radio" name="role" id="teacher"
                                                value="teacher/consellor" class="radio-register" @if (old('role') == "teacher/consellor") checked @endif>
                                            <label for="teacher" class="">
                                                <div class="radio-box">
                                                    Teacher/Consellor
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Do you want to join University Preparation
                                        Talk?</label>
                                    <div class="d-flex">
                                        <div class="position-relative mx-1">
                                            <input type="radio" name="uni_prep" id="yes" value="yes"
                                                class="radio-register" @if(old('uni_prep') == "yes") checked @elseif (!old('uni_prep')) checked @endif>
                                            <label for="yes" class="">
                                                <div class="radio-box">
                                                    Yes
                                                </div>
                                            </label>
                                        </div>
                                        <div class="position-relative mx-1">
                                            <input type="radio" name="uni_prep" id="no" value="no"
                                                class="radio-register" @if (old('uni_prep') == "no") checked @endif>
                                            <label for="no" class="">
                                                <div class="radio-box">
                                                    No
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Is this your first time attending ALL-in event?</label>
                                    <div class="d-flex">
                                        <div class="position-relative mx-1">
                                            <input type="radio" name="first_time" id="firsttime_yes"
                                                value="firsttime_" class="radio-register" @if (old('first_time') == "firsttime_") checked @endif>
                                            <label for="firsttime_yes" class="">
                                                <div class="radio-box">
                                                    Yes
                                                </div>
                                            </label>
                                        </div>
                                        <div class="position-relative mx-1">
                                            <input type="radio" name="first_time" id="firsttime_no" value="no"
                                                class="radio-register" @if (old('first_time') == "no") checked @elseif (!old('first_time')) checked @endif>
                                            <label for="firsttime_no" class="">
                                                <div class="radio-box">
                                                    No
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ url('/') }}" type="button" class="btn text-danger bg-white"><i
                                        class="bi bi-arrow-left"></i> Back
                                </a>
                                <button type="button" class="btn btn-danger" onclick="goSection(2)">Next <i
                                        class="bi bi-arrow-right"></i></button>
                            </div>
                        </section>
                        <section class="" id="section_2">
                            <div class="row mt-4">
                                <div class="col-md-12 mb-2" id="grade_input">
                                    <label for="" class="label-role student">What grade are you
                                        in</label>
                                    <label for="" class="label-role parent d-none">What grade is your
                                        child in?</label>
                                    <select name="grade" class="select is-invalid w-100 field field-1"
                                        id="grade" onchange="is_filled('grade')">
                                        <option></option>
                                        @for ($i = 7; $i <= 12; $i++)
                                            <option value="{{ $i }}" @if (old('grade') == $i) checked @endif>{{ $i }}</option>
                                        @endfor
                                        <option value="Not High School">Not High School</option>
                                    </select>
                                    <small class="text-warning"></small>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="" class="label-role student">What school are you going
                                        to graduate from?</label>
                                    <label for="" class="label-role parent d-none">What school is
                                        he/she
                                        going to graduate from?</label>
                                    <label for="" class="label-role teacher d-none">What school are
                                        you
                                        from?</label>
                                    <select name="school" class="select w-100 field field-2" id="school"
                                        onchange="checkOther('school')">
                                        <option></option>
                                        <option value="Other" @if(old('school') == 'Other') selected @endif>Other</option>
                                        @foreach ($schools as $school)
                                            <option value="{{ $school->sch_name }}" @if (old('school') == $school->sch_name) selected @endif>{{ $school->sch_name }}</option>
                                        @endforeach
                                    </select>
                                    <small class="text-warning"></small>
                                    <input type="text" name="school_other" class="form-control mt-1 d-none"
                                        id="school_other" value="{{ old('school_other') }}">
                                    <label class="text-info">Choose other if there are not your schools</label>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label class="label-role student">Where's your country destination to study
                                        abroad?</label>
                                    <label class="label-role parent d-none">In what country does he/she want to
                                        study
                                        abroad?
                                        (can choose more than 1)</label>
                                    <label class="label-role teacher d-none">What country are your students
                                        generally
                                        interested in studying abroad?</label>
                                    <select name="country[]" class="select w-100 field field-3" multiple
                                        id="country" onchange="is_filled('country')">
                                        <option></option>
                                        @foreach ($destinations as $destination)
                                            <option value="{{ $destination->id }}" @if (old('country') && in_array($destination->id, old('country'))) selected @endif>{{ $destination->name }}</option>
                                        @endforeach
                                    </select>
                                    <small class="text-warning"></small>
                                    <label class="text-info">You can choose more than one</label>
                                </div>
                                <div class="col-md-12 mb-2" id="major_input">
                                    <label for="" class="label-role student">What's your intended
                                        major in university?</label>
                                    <label for="" class="label-role parent d-none">What is your
                                        child's
                                        intended major in university?
                                        (can choose more than 1)</label>
                                    <select name="major[]" class="select w-100 field field-4" multiple id="major"
                                        onchange="checkOther('major')">
                                        <option></option>
                                        <option value="Other">Other</option>
                                        @foreach ($majors as $major)
                                            <option value="{{ $major->id }}" @if (old('major') && in_array($major->id, old('major'))) selected @endif>{{ $major->name }}</option>
                                        @endforeach
                                    </select>
                                    <small class="text-warning"></small>
                                    <input type="text" name="major_other" class="form-control mt-1 d-none"
                                        id="major_other" value="{{old('major_other')}}">
                                    <label class="text-info">You can choose more than one and Choose other if
                                        there
                                        are not your intended major</label>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="">I know this event from</label>
                                    <select name="lead" class="select w-100 field field-5" id="lead"
                                        onchange="checkOther('lead')">
                                        <option></option>
                                        <option value="Other" @if (old('lead') == 'Other') selected @endif>Other</option>
                                        @foreach ($leads as $lead)
                                            <option value="{{ $lead->id }}" @if (old('lead') == $lead->id) selected @endif >{{ $lead->name }}</option>
                                        @endforeach
                                    </select>
                                    <small class="text-warning"></small>
                                    <input type="text" name="lead_other" class="form-control mt-1 d-none"
                                        id="lead_other" value="{{ old('lead_other') }}">
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="" class="label-role student">Whats your biggest
                                        challenge in prepping for
                                        university?</label>
                                    <label for="" class="label-role parent d-none">What is your
                                        biggest
                                        challenge in helping your children preparing for university?</label>
                                    <label for="" class="label-role teacher d-none">What is your
                                        biggest
                                        challenge in helping your students preparing for university?</label>
                                    <select name="challenge" class="select w-100 field field-6" id="challenge"
                                        onchange="checkOther('challenge')">
                                        <option></option>
                                        <option value="Other" @if(old('challenge') == 'Other') selected @endif>Other</option>
                                        @foreach ($challenges as $challenge)
                                            <option value="{{ $challenge->id }}" @if (old('challenge') == $challenge->id) selected @endif >{{ $challenge->name }}</option>
                                        @endforeach
                                    </select>
                                    <small class="text-warning"></small>
                                    <input type="text" name="challenge_other" class="form-control mt-1 d-none"
                                        id="challenge_other" value="{{ old('challenge_other') }}">
                                </div>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between align-items-center">
                                <button type="button" class="btn text-danger bg-white" onclick="goSection(1)"><i
                                        class="bi bi-arrow-left"></i> Back </button>
                                <button type="button" class="btn btn-danger" onclick="goSection(3)">Submit
                                    <i class="bi bi-arrow-right"></i></button>
                            </div>
                        </section>
                    </form>
                </div>
            </div>
            <div class="col-md-5">
                <div class="sticky-top" style="top:13%">
                    <div class="bg-warning p-4 shadow rounded">
                        <h4 class="text-white mb-0 fw-bold">University Booked</h4>
                        <div class="mb-3" id="join_uni">
                            <p>Click <a href="#" class="text-danger" onclick="joinUniModal()">here</a> to book
                                your seat or make changes on your booked seats!</p>
                        </div>
                        <ul class="list-group list-group-flush overflow-auto" id="uni_box"
                            style="max-height: 300px">
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
        </div>
    </div>

    <!-- Modal -->
    <div class="modal modal-lg fade" id="univ_modal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">University Info Session</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('home.component.university-modal')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="questions_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="uni_title">University Info Session</h1>
                    <button class="btn btn-sm btn-light" data-bs-dismiss="modal" id="close_button"><i
                        class="bi bi-x"></i></button>
                </div>
                <div class="modal-body">
                    <input type="text" name="" id="uni_type" hidden>
                    <input type="text" id="uni_id" hidden>
                    <input type="text" name="" id="uni_name" hidden>
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
</div>
<script>
    function check_role(val)
    {
        $('.label-role').addClass('d-none')
        if (val == 'student') {
            $('.label-role.student').removeClass('d-none')
            $('#grade_input').removeClass('d-none')
            $('#major_input').removeClass('d-none')
        } else if (val == 'parent') {
            $('.label-role.parent').removeClass('d-none')
            $('#grade_input').removeClass('d-none')
            $('#major_input').removeClass('d-none')
        } else {
            $('.label-role.teacher').removeClass('d-none')
            $('#grade_input').addClass('d-none')
            $('#major_input').addClass('d-none')
        }
    }

    @if (old('role'))
        check_role('{{ old('role') }}')
    @endif

    @if (old('school') == 'Other')
        checkOther('school')
    @endif

    @if (old('lead') == 'Other')
        checkOther('lead')
    @endif

    @if (old('major') && in_array('Other', old('major')))
        checkOther('major')
    @endif

    @if (old('challenge') == 'Other')
        checkOther('challenge')
    @endif

    

    $('input[type=radio][name=role]').change(function() {
        $('.label-role').addClass('d-none')
        let val = this.value
        check_role(val)
    });

    function is_filled(id) {
        let val = $('#' + id).val()
        if (val == '') {
            $('#' + id).addClass('is-invalid')
            $('#' + id).siblings('span').removeClass('is-valid').addClass('is-invalid')
            $('#' + id).siblings('small').html('Please, the field is required')
        } else {
            $('#' + id).removeClass('is-invalid').addClass('is-valid')
            $('#' + id).siblings('span').removeClass('is-invalid').addClass('is-valid')
            $('#' + id).siblings('small').html('')
        }
    }

    function validatePhoneNumber() {
        let phoneNumber = $('#phone').val()
        var phoneNumberRegex = /^\+\d{2}\d{10,15}$/;
        let id = "+62"

        let first = phoneNumber.charAt(0)
        if (first == 0) {
            phoneNumber = id.concat(phoneNumber.substring(1))
            $('#phone').val(phoneNumber)
        }

        if (!phoneNumber.match(phoneNumberRegex)) {
            $('#phone').addClass('is-invalid')
            $('#phone').siblings('small').html('Please, fill in the correct phone')
            return false
        } else {
            $('#phone').removeClass('is-invalid').addClass('is-valid')
            $('#phone').siblings('small').html('')
            return true;
        }
    }

    function validate_email() {
        let email = $('#email').val()
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!regex.test(email)) {
            $('#email').addClass('is-invalid')
            $('#email').siblings('small').html('Please, fill in the correct email')
            return false
        } else {
            $('#email').removeClass('is-invalid').addClass('is-valid')
            $('#email').siblings('small').html('')
            return true
        }
    }

    function confirmEmail() {
        let email = $('#email').val()
        let confirm_email = $('#confirm_email').val()

        if (email == confirm_email) {
            $('#confirm_email').removeClass('is-invalid').addClass('is-valid')
            $('#confirm_email').siblings('small').html('')
            return true
        } else {
            $('#confirm_email').addClass('is-invalid')
            $('#confirm_email').siblings('small').html('Confirmation email is not the same as email field')
            return false
        }
    }

    function checkOther(id) {
        let value = $('#' + id).val()
        is_filled(id)
        if (value == 'Other') {
            $('#' + id + '_other').removeClass('d-none')
        } else {
            $('#' + id + '_other').addClass('d-none')
        }
    }

    function goSection(tab) {
        if (tab == 2) {
            let input = $('#section_1 .field').length
            let array = []
            for (let i = 1; i <= input; i++) {
                $('.field-' + i).siblings('small').html('')
                let value = $('#section_1 .field-' + i).val()
                if (value == '') {
                    array.push('field-' + i)
                    $('#section_1 .field-' + i).removeClass('is-valid').addClass('is-invalid')
                    $('#section_1 .field-' + i).siblings('small').html('Please, the field is required')
                } else {
                    $('#section_1 .field-' + i).removeClass('is-invalid').addClass('is-valid')
                    $('#section_1 .field-' + i).siblings('small').html('')
                }
            }

            // console.log('phone: '+validatePhoneNumber())
            // console.log('email: '+validate_email())
            // console.log('confirm: '+confirmEmail())
            if (array.length == 0) {
                if (validatePhoneNumber() && validate_email() && confirmEmail()) {
                    $('section').removeClass('active')
                    $('#section_' + tab).addClass('active')
                }
            }
        } else if (tab == 3) {

            Swal.fire({
                width: 100,
                backdrop: '#4e4e4e7d',
                allowOutsideClick: false,
            })
            Swal.showLoading();

            let input = $('#section_2 .field').length
            let role = $('input[type=radio][name=role]:checked').val()
            let array = []

            for (let i = 1; i <= input; i++) {
                $('.field-' + i).siblings('small').html('')
                let value = $('#section_2 .field-' + i).val()
                if ((i != 1 || role != 'teacher/consellor') && (i != 4 || role != 'teacher/consellor')) {
                    if (value == '') {
                        array.push('field-' + i)
                        $('#section_2 .field-' + i).siblings('span').addClass('is-invalid')
                        $('#section_2 .field-' + i).siblings('small').html('Please, the field is required')
                    } else {
                        $('#section_2 .field-' + i).siblings('span').removeClass('is-invalid').addClass('is-valid')
                        $('#section_2 .field-' + i).siblings('small').html('')
                    }
                }
            }

            if (array.length == 0) {
                localStorage.setItem('old_uni', localStorage.getItem('uni'))
                localStorage.setItem('uni', '')
                $('#register_form').submit()
            }
        } else {
            $('section').removeClass('active')
            $('#section_' + tab).addClass('active')
        }
    }

    function selected_uni() {
        @if (old('uni_select'))
            let uni_select = localStorage.getItem('old_uni') ? JSON.parse(localStorage.getItem('old_uni')) : []
        @else
            let uni_select = localStorage.getItem('uni') ? JSON.parse(localStorage.getItem('uni')) : []
        @endif
        $('#uni_box').html('')
        uni_select.forEach((uni, x) => {
            let data = JSON.stringify(uni)
            $('#uni_box').append(
                '<li class="list-group-item d-flex justify-content-between align-items-center">' +
                uni.name +
                '<div class="">' +
                '<i id="question_' + x +
                '" class="bi bi-patch-question text-primary me-2" style="cursor: pointer"' +
                'onclick="edit_uni(' + x +
                ')" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add or edit your question(s)"></i>' +
                '<i class="bi bi-trash2 text-danger" style="cursor:pointer" onclick="delete_uni(\'' + uni
                .id + '\')" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Cancel"></i>' +
                ' </div>' +
                '</li>'
            )
            $('#question_' + x).attr('data-info', data);
        });
        @if (old('uni_select'))
            $('#uni_textarea').html(localStorage.getItem('old_uni'))
        @else
            $('#uni_textarea').html(localStorage.getItem('uni'))
        @endif
        // console.log(uni_select);
    }

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

        $('#questions_modal').modal('hide')
        if ($('#uni_type').val() != 'edit') {
            $('#univ_modal').modal('show')
        }

        $('#uni_id').val('')
        $('#uni_name').val('')
        $('#uni_questions').val('')
        $('#uni_type').val('')
        let message = status ? 'with questions' : 'without questions'
        toast('success', 'University info session successfully booked ' + message)

        localStorage.setItem('uni', JSON.stringify(uni_checked))

        check_uni()
        selected_uni()
    }

    function edit_uni(id) {
        let uni = $('#question_' + id).data('info')
        // Add Questions 
        $('#questions_modal').modal('show')
        $('#close_button').removeAttr('onclick')
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

                let uni_select = localStorage.getItem('uni') ? JSON.parse(localStorage.getItem('uni')) : null
                let myArray = uni_select.filter(function(obj) {
                    return obj.id !== id;
                });

                toast('success', 'Cancellation has been successful')
                localStorage.setItem('uni', JSON.stringify(myArray))

                check_uni()
                selected_uni()
            }
        })
    }

    function joinUniModal() {
        // check_uni()
        setTimeout(() => {
            $('#univ_modal').modal('show')
        }, 500);
    }

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

    selected_uni()
</script>

<style scoped>
    #register {
        margin: 7% 0 3% 0;
        /* position: relative; */
        /* overflow: hidden; */
    }

    #register_form {
        position: relative;
        width: 100%;
        overflow: hidden;
    }

    #register_form section {
        position: absolute;
        visibility: hidden;
        top: 0;
        left: 0;
    }

    #register_form section.active {
        position: relative;
        visibility: visible;
    }

    .radio-register {
        position: absolute;
        z-index: -1;
        top: 0;
        left: 0;
    }

    .radio-box {
        transition: all 0.3s ease-in-out;
        background: white;
        border: 3px solid #dedede;
        color: #636363;
        padding: 0 25px;
        border-radius: 6px;
        height: 40px;
        font-size: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        letter-spacing: 1px;
    }

    .radio-register:checked~label .radio-box {
        background: #1FAF38;
        color: white;
        border: 3px solid #37c34e;
    }

    .form-control {
        outline: none !important;
        box-shadow: none !important;
        border: 2px solid #dedede;
    }

    .select2-container.is-invalid {
        border: 2px solid red !important;
        border-radius: 5px !important;
    }

    .select2-container.is-valid {
        border: 2px solid green !important;
        border-radius: 5px !important;
    }

    label {
        font-size: 14px;
    }

    small.text-danger,
    label.text-info {
        margin-top: 5px;
        display: block;
        font-size: 12px !important;
    }
</style>
