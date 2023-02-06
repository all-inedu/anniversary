<div class="container-fluid" id="register">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 bg-primary text-white">
                <div class="row">
                    <div class="col-md-7 p-3">
                        <h4 class="text-warning">Fill The Information</h4>
                        <form action="" id="register_form" method="POST">
                            @csrf
                            <section class="active" id="section_1">
                                <div class="row mt-4">
                                    <div class="col-md-12 mb-3">
                                        <label for="">Full Name</label>
                                        <input type="text" name="fullname" class="form-control field field-1"
                                            placeholder="Full Name" id="name" onchange="is_filled('name')">
                                        <small class="text-danger"></small>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Email Address</label>
                                        <input type="email" name="email" class="form-control field field-2"
                                            placeholder="Email" id="email" onchange="validate_email()">
                                        <small class="text-danger"></small>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Phone Number</label>
                                        <input type="tel" name="phone" class="form-control field field-3"
                                            placeholder="Phone Number" id="phone" onchange="is_filled('phone')">
                                        <small class="text-danger"></small>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="">Address</label>
                                        <textarea name="address" cols="30" rows="5" class="form-control field field-4" id="address" onchange="is_filled('address')"></textarea>
                                        <small class="text-danger"></small>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">You are a</label>
                                        <div class="d-flex">
                                            <div class="position-relative mx-1">
                                                <input type="radio" name="type" id="student" value="student"
                                                    class="radio-register" checked>
                                                <label for="student" class="">
                                                    <div class="radio-box">
                                                        Student
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="position-relative mx-1">
                                                <input type="radio" name="type" id="parent" value="parent"
                                                    class="radio-register">
                                                <label for="parent" class="">
                                                    <div class="radio-box">
                                                        Parent
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="position-relative mx-1">
                                                <input type="radio" name="type" id="teacher" value="teacher"
                                                    class="radio-register">
                                                <label for="teacher" class="">
                                                    <div class="radio-box">
                                                        Teacher/Consellor
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="{{ url('/') }}" type="button" class="btn text-danger bg-white"><i
                                            class="bi bi-arrow-left"></i> Back </a>
                                    <button type="button" class="btn btn-danger" onclick="goSection(2)">Next <i
                                            class="bi bi-arrow-right"></i></button>
                                </div>
                            </section>
                            <section class="" id="section_2">
                                <div class="row mt-4">
                                    <div class="col-md-12 mb-3">
                                        <label for="">What grade are you in</label>
                                        <select name="grade" class="form-select">
                                            <option value="1">1</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="">What school are you going to graduate from?</label>
                                        <select name="school" class="form-select">
                                            <option value="1">1</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="">Where's your country destination to study abroad?</label>
                                        <select name="country" class="form-select">
                                            <option value="1">1</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="">What's your intended major in university?</label>
                                        <select name="major" class="form-select">
                                            <option value="1">1</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="">I know this Edufair from</label>
                                        <select name="lead" class="form-select">
                                            <option value="1">1</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="">Whats your biggest challenge in prepping for
                                            university?</label>
                                        <select name="challenge" class="form-select">
                                            <option value="1">1</option>
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between align-items-center">
                                    <button type="button" class="btn text-danger bg-white" onclick="goSection(1)"><i
                                            class="bi bi-arrow-left"></i> Back </button>
                                    <button type="submit" class="btn btn-danger">Submit <i
                                            class="bi bi-arrow-right"></i></button>
                                </div>
                            </section>
                        </form>
                    </div>
                    <div class="col-md-5 p-3">
                        <h4 class="text-warning">University Booked</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function is_filled(id) {
        let val = $('#'+id).val()
        if(val=='') {
            $('#'+id).siblings('small').html('Please, the field is required')
        } else {
            $('#'+id).siblings('small').html(null)
        }
    }

    function validate_email() {
        let email = $('#email').val()
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!regex.test(email)) {
            $('#email').siblings('small').html('Please, fill in the correct email')
        } else {
            return true
        }
    }

    function goSection(tab) {
        if (tab == 2) {
            let input = $('#section_1 .field').length
            for (let i = 1; i <= input; i++) {
                $('.field-' + i).siblings('small').html('')

                if ($('.field-' + i).val() == '') {
                    $('.field-' + i).siblings('small').html('Please, the field is required')
                } else {
                    if(validate_email()) {
                        $('section').removeClass('active')
                        $('#section_' + tab).addClass('active')
                    }
                }
            }
        } else {
            $('section').removeClass('active')
            $('#section_' + tab).addClass('active')
        }
    }
</script>

<style scoped>
    #register {
        margin: 7% 0;
        position: relative;
        overflow: hidden;
    }

    #register_form section {
        position: absolute;
        visibility: hidden;
        /* display: none; */
    }

    #register_form section.active {
        position: relative;
        visibility: visible;
        /* display: block; */
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
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }

    .radio-register:checked~label .radio-box {
        background: var(--bs-red);
        border: 3px solid #fff;
    }

    label {
        font-size: 12px;
    }
</style>
