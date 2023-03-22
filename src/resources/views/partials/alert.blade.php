<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('successAlert'))
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: "{{ session('successAlert') }}",
            showConfirmButton: false,
            timer: 2000
        })
    </script>
@endif
