<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @if ($data->type == 'kerja_praktek')
            Kerja Praktek
        @else
            Tugas Akhir
        @endif
    </title>
    <link rel="stylesheet" href="assets/css/main.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#f6f2ef]">
    <nav class="w-full">
        <div class="flex justify-between py-4 px-4 md:px-20">
            <div>
                <a href="/menu-document">
                    <button type="button"
                        class="inline-flex bg-[#997b70] text-white py-2 px-3 rounded-2xl text-xl hover:bg-[#ccab90]">
                        <ion-icon name="chevron-back" class="my-auto mr-1"></ion-icon> Kembali
                    </button>
                </a>
            </div>
            <div>
                <button type="button" id="logout-btn"
                    class="inline-flex bg-[#997b70] text-white py-2 px-3 rounded-2xl text-xl hover:bg-[#ccab90]">Log Out
                    <ion-icon name="log-out" class="my-auto ml-1"></ion-icon>
                </button>
            </div>
        </div>
    </nav>
    <div class="h-screen relative flex justify-center">
        <form action="{{ route('documentPost', $data->id) }}" method="POST" enctype="multipart/form-data"
            class="my-auto">
            @csrf
            <h1 class="text-center text-3xl text-[#997b70] mb-6">
                @if ($data->type == 'kerja_praktek')
                    Kerja Praktek
                @else
                    Tugas Akhir
                @endif
            </h1>
            <div class="flex flex-col bg-[#997b70] p-12 rounded-2xl">
                <label for="upload"
                    class="w-52 bg-transparent border border-white text-center text-white py-6 px-6 rounded-full mt-7 mb-3 mx-2 text-xl hover:bg-[#ccab90] cursor-pointer">
                    Pilih Dokumen
                </label>
                <input type="file" name="document" id="upload" class="opacity-0 -z-0 absolute mt-7 ml-7" required>
                <input type="hidden" name="user_id" value="{{ Auth::guard('web')->id() }}">
                <button type="submit"
                    class="w-36 mx-auto bg-[#f6f2ef] text-[#997b70] py-5 px-5 rounded-2xl mt-3 mb-7 text-xl hover:bg-[#ccab90]">Unggah</button>
            </div>
            <a href="#">
                <h1 class="mt-2 mb-1 text-center text-2xl text-gray-800">Contact Person</h1>
            </a>
            <center>
                <div class="inline-flex">
                    <a href="http://wa.me/+6285868842160" target="__blank" class="my-auto mx-3">
                        <img src="{{ asset('assets/img/WhatsApp_icon.png') }}" alt="whatsapp" width="30">
                    </a>
                    <a href="http://t.me/anizaawp" target="__blank" class="my-auto mx-3">
                        <img src="{{ asset('assets/img/telegram-png-21803.png') }}" alt="telegram" width="27">
                    </a>
                    <a href="mailto:annisawahyuprakasa@gmail.com" target="__blank" class="my-auto mx-3">
                        <img src="{{ asset('assets/img/logo-gmail-9952.png') }}" alt="gmail" width="30">
                    </a>
                </div>
            </center>
        </form>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
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
        @if (session('errors'))
            var errorMessage = '';
            @foreach ($errors->all() as $error)
                errorMessage += "{{ $error }}" + '\n';
            @endforeach
            // Tampilkan SweetAlert pesan error
            Swal.fire({
                icon: 'error',
                title: 'Gagal Upload File',
                text: errorMessage
            });
        @endif
    </script>
</body>

</html>
