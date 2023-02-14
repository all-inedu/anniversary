<div class="row row-cols-md-4 row-cols-2 g-3 overflow-auto" style="height:70vh">
    @foreach ($universities as $university)
        <div class="col">
            <div class="shadow position-relative uni-box-select w-100">
                <input type="checkbox" class="position-absolute top-0 left-0 uni-select" id="uni_{{ $loop->index }}"
                    value="{{ $university->uuid }}" data-uni="{{ $university->name }}" onchange="select_uni('{{ $loop->index }}')">
                <span class="checkmark"></span>
                <label for="uni_{{ $loop->index }}" class="d-block" style="cursor: pointer">
                    <div style="min-height:150px; max-height: 150px;" class="bg-light overflow-hidden d-flex align-items-center">
                        <img src="{{ isset($university->thumbnail) ? asset('storage/'.$university->thumbnail) : 'https://lightwidget.com/wp-content/uploads/local-file-not-found-480x488.png' }}" onerror="this.onerror=null; this.src='https://lightwidget.com/wp-content/uploads/local-file-not-found-480x488.png'"
                            alt=""  class="uni-thumbnail" style="width: 150%">
                    </div>
                    <div class="uni-box d-flex justify-content-between">
                        <div class="">{{ date('d F', strtotime($university->session_start)) }}</div>
                        <div class="">{{ date('h.i A', strtotime($university->time_start)) }}</div>
                    </div>

                    <div class="book-overflow overflow-{{ $loop->index }} d-none"></div>
                    <h3 class="text-overflow overflow-{{ $loop->index }} d-none">
                        <img src="{{ asset('img/uni/BOOKED.webp') }}" alt="" class="w-100">
                    </h3>
                </label>
            </div>
        </div>
    @endforeach
</div>

<script>
    function select_uni(id) {
        let uni_select = localStorage.getItem('uni') ? JSON.parse(localStorage.getItem('uni')) : []

        let uni_length = $('.uni-select').length
        let checked = $('.uni-select').is(":checked")

        // Add Questions 
        if (id) {
            let uni_id = $('#uni_' + id).is(":checked")
            if (uni_id) {
                $('#questions_modal').modal('show')
                $('#univ_modal').modal('hide')
                $('#uni_title').html($('#uni_' + id).data('uni'))
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

                    selected_uni()
                    check_uni()
                }

            }
        }
    }

    function check_uni() {
        let uni_select = localStorage.getItem('uni') ? JSON.parse(localStorage.getItem('uni')) : []
        let uni_length = $('.uni-select').length

        for (let i = 0; i < uni_length; i++) {
            $('#uni_' + i).prop('checked', false)
            $('.overflow-' + i).addClass('d-none')
        }

        // check uni length 
        for (let i = 0; i < uni_length; i++) {
            let value = $('#uni_' + i).val()
            for (let x = 0; x < uni_select.length; x++) {
                if (value == uni_select[x].id) {
                    $('#uni_' + i).prop('checked', true)
                    $('.overflow-' + i).removeClass('d-none')
                }
            }
        }
    }
    check_uni()
</script>

<style>
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
