<div class="container-fluid" id="register">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-white">
                <div class="row align-items-stretch">
                    <div class="col-md-7">
                        <div class="bg-primary p-4 h-100 shadow">
                            <h4 class="text-warning fw-bold">Fill The Information</h4>
                            <form action="{{ route('register.store') }}" id="register_form" method="POST" class="mb-3">
                                @csrf
                                <textarea name="uni_select" id="uni_textarea" hidden></textarea>
                                <section class="active" id="section_1">
                                    <div class="row mt-4">
                                        <div class="col-md-12 mb-2">
                                            <label for="">Full Name</label>
                                            <input type="text" name="fullname" class="form-control field field-1"
                                                placeholder="Full Name" id="name" onchange="is_filled('name')">
                                            <small class="text-danger"></small>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="">Email Address</label>
                                            <input type="email" name="email_address" class="form-control field field-2"
                                                placeholder="Email" id="email" onchange="validate_email()">
                                            <small class="text-danger"></small>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="">Phone Number</label>
                                            <input type="tel" name="phone_number" class="form-control field field-3"
                                                placeholder="Phone Number" id="phone" onchange="is_filled('phone')">
                                            <small class="text-danger"></small>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label for="">Address</label>
                                            <textarea name="address" cols="30" rows="5" class="form-control field field-4" id="address"
                                                onchange="is_filled('address')"></textarea>
                                            <small class="text-danger"></small>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="">You are a</label>
                                            <div class="d-flex">
                                                <div class="position-relative mx-1">
                                                    <input type="radio" name="role" id="student" value="student"
                                                        class="radio-register" checked>
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
                                                        <div class="radio-box">
                                                            Parent
                                                        </div>
                                                    </label>
                                                </div>
                                                <div class="position-relative mx-1">
                                                    <input type="radio" name="role" id="teacher" value="teacher/counsellor"
                                                        class="radio-register">
                                                    <label for="teacher" class="">
                                                        <div class="radio-box">
                                                            Teacher/Consellor
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="position-relative mx-1">
                                            <input type="radio" name="role" id="parent" value="parent"
                                                class="radio-register">
                                            <label for="parent" class="">
                                                <div class="radio-box">
                                                    Parent
                                                </div>
                                            </label>
                                        </div>
                                        <div class="position-relative mx-1">
                                            <input type="radio" name="role" id="teacher" value="teacher"
                                                class="radio-register">
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
                                                class="radio-register" checked>
                                            <label for="yes" class="">
                                                <div class="radio-box">
                                                    Yes
                                                </div>
                                            </label>
                                        </div>
                                        <div class="position-relative mx-1">
                                            <input type="radio" name="uni_prep" id="no" value="no"
                                                class="radio-register">
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
                                            <input type="radio" name="first_time" id="firsttime_yes" value="firsttime_"
                                                class="radio-register">
                                            <label for="firsttime_yes" class="">
                                                <div class="radio-box">
                                                    Yes
                                                </div>
                                            </label>
                                        </div>
                                        <div class="position-relative mx-1">
                                            <input type="radio" name="first_time" id="firsttime_no" value="no"
                                                class="radio-register" checked>
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
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                        <option value="Not High School">Not High School</option>
                                    </select>
                                    <small class="text-danger"></small>
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
                                        <option value="Other">Other</option>
                                    </select>
                                    <small class="text-danger"></small>
                                    <input type="text" name="school_other" class="form-control mt-1 d-none"
                                        id="school_other">
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
                                    <select name="country" class="select w-100 field field-3" multiple id="country"
                                        onchange="is_filled('country')">
                                        <option></option>
                                        <option value="1">1</option>
                                    </select>
                                    <small class="text-danger"></small>
                                    <label class="text-info">You can choose more than one</label>
                                </div>
                                <div class="col-md-12 mb-2" id="major_input">
                                    <label for="" class="label-role student">What's your intended
                                        major in university?</label>
                                    <label for="" class="label-role parent d-none">What is your
                                        child's
                                        intended major in university?
                                        (can choose more than 1)</label>
                                    <label for="" class="label-role teacher d-none">What is your
                                        child's
                                        intended major in university?
                                        (can choose more than 1)</label>
                                    <select name="major[]" class="select w-100 field field-4" multiple id="major"
                                        onchange="checkOther('major')">
                                        <option></option>
                                        <option value="Other">Other</option>
                                    </select>
                                    <small class="text-danger"></small>
                                    <input type="text" name="major_other" class="form-control mt-1 d-none"
                                        id="major_other">
                                    <label class="text-info">You can choose more than one and Choose other if
                                        there
                                        are not your intended major</label>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="">I know this event from</label>
                                    <select name="lead" class="select w-100 field field-5" id="lead"
                                        onchange="checkOther('lead')">
                                        <option></option>
                                        <option value="Other">Other</option>
                                    </select>
                                    <small class="text-danger"></small>
                                    <input type="text" name="lead_other" class="form-control mt-1 d-none"
                                        id="lead_other">
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
                                        <option value="Other">Other</option>
                                    </select>
                                    <small class="text-danger"></small>
                                    <input type="text" name="challenge_other" class="form-control mt-1 d-none"
                                        id="challenge_other">
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
                            <p>Click <a href="#" class="text-danger" onclick="joinUniModal()">here</a> to
                                join the University Info Session.</p>
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
</div>
<script>
    $('input[type=radio][name=role]').change(function() {
        $('.label-role').addClass('d-none')
        let val = this.value
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

    function validate_email() {
        let email = $('#email').val()
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!regex.test(email)) {
            $('#email').addClass('is-invalid')
            $('#email').siblings('small').html('Please, fill in the correct email')
        } else {
            $('#email').removeClass('is-invalid').addClass('is-valid')
            $('#email').siblings('small').html('')
            return true
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

            if (array.length == 0) {
                if (validate_email()) {
                    $('section').removeClass('active')
                    $('#section_' + tab).addClass('active')
                }
            }
        } else if (tab == 3) {
            let input = $('#section_2 .field').length
            let array = []
            for (let i = 1; i <= input; i++) {
                $('.field-' + i).siblings('small').html('')
                let value = $('#section_2 .field-' + i).val()
                if (value == '') {
                    array.push('field-' + i)
                    $('#section_2 .field-' + i).siblings('span').addClass('is-invalid')
                    $('#section_2 .field-' + i).siblings('small').html('Please, the field is required')
                } else {
                    $('#section_2 .field-' + i).siblings('span').removeClass('is-invalid').addClass('is-valid')
                    $('#section_2 .field-' + i).siblings('small').html('')
                }
            }

            if (array.length == 0) {
                $('#register_form').submit()
            }
        } else {
            $('section').removeClass('active')
            $('#section_' + tab).addClass('active')
        }
    }

    function selected_uni() {
        let uni_select = localStorage.getItem('uni') ? JSON.parse(localStorage.getItem('uni')) : null
        $('#uni_box').html('')
        uni_select.forEach(uni => {
            $('#uni_box').append(
                '<li class="list-group-item d-flex justify-content-between align-items-center">' +
                uni.name +
                '<div class="">' +
                '<i class="bi bi-trash2 text-danger" style="cursor:pointer" onclick="delete_uni(\'' + uni
                .id + '\')"></i>' +
                ' </div>' +
                '</li>'
            )
        });
        $('#uni_textarea').html(localStorage.getItem('uni'))
        // console.log(uni_select);
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

                localStorage.setItem('uni', JSON.stringify(myArray))
                check_uni()
                selected_uni()

                let Toast = Swal.mixin({
                    toast: true,
                    position: 'bottom-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'success',
                    title: 'Cancellation has been successful',
                })
            }
        })
    }

    function joinUniModal() {
        check_uni()
        setTimeout(() => {
            $('#univ_modal').modal('show')
        }, 500);
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
        background: var(--bs-orange);
        border: 3px solid var(--bs-orange);
        color: white;
        padding: 0 25px;
        border-radius: 6px;
        height: 40px;
        font-size: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }

    .radio-register:checked~label .radio-box {
        background: var(--bs-red);
        border: 3px solid #fff;
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
