<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>

<body class="bg-[#f6f2ef]">
    @include('sweetalert::alert')
    @yield('content')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('#logout-btn').on('click', () => {
            Swal.fire({
                title: 'Konfirmasi logout?',
                text: "Konfirmasi apabila anda yakin untuk logout.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#997b70',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, saya yakin'
            }).then((result) => {
                if (result.isConfirmed) {
                    let routeUrl = '/logout';
                    window.location.href = routeUrl;
                }
            })
        });
    </script>

</body>

</html>
