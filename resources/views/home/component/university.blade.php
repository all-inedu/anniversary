<div class="container-fluid position-relative overflow-hidden" id="university">
    <img loading="lazy" src="{{asset('img/asset 4.svg')}}" alt="" class="position-absolute d-md-inline-block d-none slide-fwd-center" style="left:-10%; top:55%; width:20%;" >
    <img loading="lazy" src="{{asset('img/asset 3.svg')}}" alt="" class="position-absolute d-md-inline-block d-none slide-fwd-center" style="right:-4%; bottom:0%; width:15%;" >
    <div class="container h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-md-7 col-12">
                <img loading="lazy" src="{{ asset('img/uni-info.svg') }}" alt="" class="w-100">
            </div>
            <div class="col-md-9 col-12">
                <div class="subtitle-uni text-center">
                    Book your seat and meet the world’s top university representatives, curated by ALL-in
                </div>
            </div>
            <div class="col-md-11 mt-5">
                <div class="row row-cols-md-4 row-cols-2 g-3">
                    @for ($i = 0; $i < 20; $i++)
                        <div class="col">
                            <div class="shadow position-relative uni-box-select w-100">
                                <input type="checkbox" class="position-absolute top-0 left-0 uni-select"
                                    id="uni_{{ $i }}" value="uni-{{ $i }}"
                                    data-uni="University {{ $i }}" onchange="select_uni()">
                                <span class="checkmark"></span>
                                <label for="uni_{{ $i }}" class="d-block" style="cursor: pointer">
                                    <img loading="lazy" src="{{ asset('img/uni.svg') }}" alt="" class="w-100">
                                    <div class="uni-box d-flex justify-content-between">
                                        <div class="">6 March</div>
                                        <div class="">06.00 AM</div>
                                    </div>

                                    <div class="book-overflow overflow-{{ $i }} d-none"></div>
                                    <h3 class="text-overflow overflow-{{ $i }} d-none">BOOKED</h3>
                                </label>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</div>

{{-- sticky-bottom  --}}
<div class="container-fluid position-fixed bottom-0 left-0 w-100 uni-check d-flex justify-content-between align-items-center"
    id="indicator_checked">
    <div id="uni_selected">
        <div class="d-flex align-items-center" style="font-weight: 300;">
            <div class="badge bg-white text-dark"></div>
            <div class="text-white ms-2 dropup" style="cursor: pointer">
                <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    Selected University
                </div>
                <ul id="uni_list" class="dropdown-menu dropdown-menu-end px-2 shadow" style="width: 250px; font-size:13px;">

                </ul>
            </div>
        </div>
    </div>
    <div class="">
        <a href="{{url('/register')}}" class="btn btn-warning text-uppercase text-dark">
            Register Now
        </a>
    </div>
</div>

<script>
    function select_uni() {
        let uni_length = $('.uni-select').length
        let checked = $('.uni-select').is(":checked")
        // let uni_id =  $('#uni_'+id).val()
        let uni_checked = []
        $('#uni_list').html('');
        for (let i = 0; i < uni_length; i++) {

            let checked = $('#uni_' + i).is(":checked")
            if (checked) {
                let arr = {
                    'id': $('#uni_' + i).val(),
                    'name': $('#uni_' + i).data('uni')
                }
                uni_checked.push(arr)
            } else {
                $('.overflow-' + i).addClass('d-none')
            }
        }

        localStorage.setItem('uni', JSON.stringify(uni_checked))
        // console.log(JSON.parse(localStorage.getItem('uni')));
        check_uni()
    }

    function delete_uni(id) {
        let uni_length = $('.uni-select').length
        for (let i = 0; i < uni_length; i++) {
            let value = $('#uni_' + i).val()
            if (value == id) {
                $('#uni_' + i).prop('checked', false)
            }
        }

        select_uni()
    }

    function check_uni() {
        let uni_select = localStorage.getItem('uni') ? JSON.parse(localStorage.getItem('uni')) : null
        let uni_length = $('.uni-select').length
        // check uni length 
        if (uni_select.length > 0) {
            $('#indicator_checked').addClass('active')
            $('#uni_selected .badge').html(uni_select.length)
        } else {
            $('#indicator_checked').removeClass('active')
        }

        for (let i = 0; i < uni_length; i++) {
            let value = $('#uni_' + i).val()
            for (let x = 0; x < uni_select.length; x++) {
                if (value == uni_select[x].id) {
                    $('#uni_' + i).attr('checked', true)
                    $('.overflow-' + i).removeClass('d-none')
                    $('#uni_list').append(
                        '<li class="d-flex justify-content-between align-items-center" >' +
                        '<div class="">' + uni_select[x].name + '</div>' +
                        '<i class="bi bi-trash2 text-danger" style="cursor: pointer" onclick="delete_uni(\'' +
                        uni_select[x].id + '\')"></i>' +
                        '</li>'
                    );
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
        font-weight: bold;
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
        background: #BE1E2D;
        color: white;
        top: 35%;
        left: 25%;
        transform: rotate(-20deg);
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
        border-radius: 0 !important;
    }

    #uni_list li {
        border-top: 1px solid #dedede !important;
        padding: 5px 0;
    }

    #uni_list li:first-child {
        border-top: none !important;
    }
</style>
