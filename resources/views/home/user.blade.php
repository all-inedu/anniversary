@extends('app')
@section('body')
    @include('home.component.navbar')
    <div class="container" id="user">
        <div class="row g-3">
            <div class="col-md-3">
                <div class="card shadow border-0 mb-3">
                    <div class="card-body text-center">
                        <img src="{{ asset('img/user.png') }}" alt="" class="w-25 mb-3">
                        <h5>Hi, John Doe</h5>
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
            <div class="col-md-9">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="row row-cols-md-4 row-cols-2 g-3 overflow-auto" style="height:70vh">
                            @for ($i = 0; $i < 20; $i++)
                                <div class="col">
                                    <div class="shadow position-relative uni-box-select w-100">
                                        <input type="checkbox" class="position-absolute top-0 left-0 uni-select"
                                            id="uni_{{ $i }}" value="uni-{{ $i }}"
                                            data-uni="University {{ $i }}" onchange="select_uni()">
                                        <span class="checkmark"></span>
                                        <label for="uni_{{ $i }}" class="d-block" style="cursor: pointer">
                                            <img src="{{ asset('img/default.png') }}" alt="" class="w-100">
                                            <div class="uni-box d-flex justify-content-between">
                                                <div class="">6 March</div>
                                                <div class="">06.00 AM</div>
                                            </div>

                                            <div class="book-overflow overflow-{{ $i }} d-none"></div>
                                            <h3 class="text-overflow overflow-{{ $i }} d-none">
                                                <img src="{{ asset('img/uni/BOOKED.webp') }}" alt="" class="w-100">
                                            </h3>
                                        </label>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function check_uni() {
            // AXIOS HERE 
            // Insert Array From Controller to localStorage.setItem('uni' json_strngfy(array))

            let uni_select = localStorage.getItem('uni') ? JSON.parse(localStorage.getItem('uni')) : null
            let uni_length = $('.uni-select').length

            for (let i = 0; i < uni_length; i++) {
                $('#uni_' + i).prop('checked', false)
                $('.overflow-' + i).addClass('d-none')
            }

            // Check Booking
            for (let i = 0; i < uni_length; i++) {
                let value = $('#uni_' + i).val()
                for (let x = 0; x < uni_select.length; x++) {
                    if (value == uni_select[x].id) {
                        $('#uni_' + i).prop('checked', true)
                        $('.overflow-' + i).removeClass('d-none')
                    }
                }
            }

            // Uni Box  List
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
        }

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

            // AXIOS HERE ...
            // Update book uni info session from localStorage  
            check_uni()
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

                    // AXIOS HERE ...
                    // Update book uni info session from localStorage

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

        check_uni()
        selected_uni()
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
            z-index: 1056;
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
