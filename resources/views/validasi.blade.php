@extends('template')

@section('title', 'Validasi Upload')

@section('content')
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
        <div class="my-auto">
            <h1 class="text-center text-[#74554a] text-4xl mb-7 tracking-wider">Validasi Cetak Dokumen</h1>
            <form action="{{ route('validasiProses', $data->id) }}" method="POST" enctype="multipart/form-data"
                class="flex flex-col bg-[#997b70] p-12 rounded-2xl">
                @csrf
                <div class="flex justify-center">
                    <label for="upload-lembing"
                        class="w-60 bg-[#f6f2ef] text-center text-[#997b70] py-6 px-3 rounded-2xl mb-3 mr-4 text-xl">
                        Unggah Lembar Bimbingan
                    </label>
                    <input type="file" name="lembar_bimbingan" id="upload-lembing"
                        class="opacity-0 -z-0 absolute mt-7 ml-7" required>
                    <input type="checkbox" id="check-lembing" name="c1"
                        class="w-7 bg-transparent outline-none border border-orange-200 hover:border-orange-300" required>
                </div>
                <div class="flex justify-center">
                    <label for="upload-ttd"
                        class="w-60 bg-[#f6f2ef] text-center text-[#997b70] py-6 px-3 rounded-2xl mb-3 mr-4 text-xl">
                        Unggah Tanda Tangan Dosen Pembimbing
                    </label>
                    <input type="file" name="ttd_dospem" id="upload-ttd" class="opacity-0 -z-0 absolute mt-7 ml-7"
                        required>
                    <input type="checkbox" id="check-ttd" name="c2"
                        class="w-7 bg-transparent outline-none border border-orange-200 hover:border-orange-300" required>
                </div>
                <div class="flex justify-center">
                    <button type="submit"
                        class="w-52 bg-transparent text-white border border-white py-6 px-3 rounded-full mt-7 text-xl hover:bg-[#ccab90]">Cetak
                        Dokumen</button>
                </div>
                <p class="text-white text-center mt-7">*jika tidak melunasi pembayaran, <br> akan dikenakan denda sebesar
                    75% dari total biaya.</p>
            </form>
            <a href="#">
                <h1 class="mt-10 mb-1 text-center text-2xl text-gray-800">Contact Person</h1>
            </a>
            <center>
                <div class="inline-flex">
                    <a href="http://wa.me/+6285868842160" class="my-auto mx-3">
                        <img src="{{ asset('assets/img/WhatsApp_icon.png') }}" alt="whatsapp" width="30">
                    </a>
                    <a href="http://t.me/anizaawp" class="my-auto mx-3">
                        <img src="{{ asset('assets/img/telegram-png-21803.png') }}" alt="telegram" width="27">
                    </a>
                    <a href="mailto:annisawahyuprakasa@gmail.com" class="my-auto mx-3">
                        <img src="{{ asset('assets/img/logo-gmail-9952.png') }}" alt="gmail" width="30">
                    </a>
                </div>
            </center>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function checkUploadedFiles() {
            if ($('#upload-lembing').get(0).files.length === 0) {
                $('#check-lembing').prop('checked', false);
            } else {
                $('#check-lembing').prop('checked', true);
            }

            if ($('#upload-ttd').get(0).files.length === 0) {
                $('#check-ttd').prop('checked', false);
            } else {
                $('#check-ttd').prop('checked', true);
            }
        }
        // Menjalankan fungsi checkUploadedFiles setiap 1.5 detik (1500 milidetik)
        setInterval(checkUploadedFiles, 1500);
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

@endsection
