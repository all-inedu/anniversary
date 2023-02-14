<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
    function tooltip() {
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    }
    tooltip()
</script>

<script>
    AOS.init();
    $('.select').select2({
        placeholder: "Your answer",
        allowClear: true,
        width: 'resolve'
    });
</script>

{{-- Loading when load document --}}
<script>
    Swal.fire({
        html: "<img src='{{ asset('img/logo-allin.png') }}' class='w-75' />",
        allowEscapeKey: false,
        allowOutsideClick: false,
        background: '#fff',
        color: '#fff',
        width: 300,
        didOpen: () => {
            Swal.showLoading()
        }
    });
    window.onload = (event) => {
        Swal.close()
    };

    const Toast = Swal.mixin({
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

    function notification(status, message) {
        Toast.fire({
            icon: status,
            title: message
        })
    }
</script>


{{-- Notification by Session  --}}
@if (session('success') || session('error'))
    <script>
        function toast() {
            const Toast = Swal.mixin({
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
                icon: '{{ session('success') ? 'success' : 'error' }}',
                title: '{{ session('success') ? session('success') : session('error') }}'
            })
        }

        setTimeout(() => {
            toast();
        }, 2000);
    </script>
@endif
