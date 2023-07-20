@extends('template')

@section('title', 'Menu')

@section('content')
    <nav class="w-full">
        <div class="flex justify-between py-4 px-4 md:px-20">
            <div></div>
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
            <div class="flex flex-col bg-[#997b70] p-12 rounded-2xl">
                <div>
                    @if ($data != null)
                        @if ($data->status != 'selesai')
                            <a href="/menu-document">
                                <button type="button"
                                    class="w-52 bg-[#f6f2ef] text-[#997b70] py-6 px-3 rounded-2xl mb-3 text-xl hover:bg-[#ccab90] disabled:pointer-events-none disabled:bg-gray-200 disabled:text-gray-400 disabled:cursor-not-allowed"
                                    disabled>Unggah Dokumen</button>
                            </a>
                        @else
                            <a href="/menu-document">
                                <button type="button"
                                    class="w-52 bg-[#f6f2ef] text-[#997b70] py-6 px-3 rounded-2xl mb-3 text-xl hover:bg-[#ccab90] disabled:pointer-events-none disabled:bg-gray-200 disabled:text-gray-400 disabled:cursor-not-allowed">Unggah
                                    Dokumen</button>
                            </a>
                        @endif
                    @else
                        <a href="/menu-document">
                            <button type="button"
                                class="w-52 bg-[#f6f2ef] text-[#997b70] py-6 px-3 rounded-2xl mb-3 text-xl hover:bg-[#ccab90] disabled:pointer-events-none disabled:bg-gray-200 disabled:text-gray-400 disabled:cursor-not-allowed">Unggah
                                Dokumen</button>
                        </a>
                    @endif
                </div>
                @if ($data == null)
                    {{-- <a href="{{ route('status', $data->id) }}"> --}}
                    <button type="submit" id="not-allowed"
                        class="w-52 bg-[#f6f2ef] text-[#997b70] py-6 px-3 rounded-2xl mt-3 text-xl hover:bg-[#ccab90]">Status
                        Percetakan</button>
                    {{-- </a> --}}
                @else
                    <a href="{{ route('status', $data->id) }}">
                        <button type="button"
                            class="w-52 bg-[#f6f2ef] text-[#997b70] py-6 px-3 rounded-2xl mt-3 text-xl hover:bg-[#ccab90]">Status
                            Percetakan</button>
                    </a>
                @endif
            </div>
            <a href="#">
                <h1 class="mt-10 mb-1 text-center text-2xl text-gray-800">Contact Person</h1>
            </a>
            <center>
                <div class="inline-flex">
                    <a href="http://wa.me/+6285868842160" target="__blank" class="my-auto mx-3">
                        <img src="assets/img/WhatsApp_icon.png" alt="whatsapp" width="30">
                    </a>
                    <a href="http://t.me/anizaawp" target="__blank" class="my-auto mx-3">
                        <img src="assets/img/telegram-png-21803.png" alt="telegram" width="27">
                    </a>
                    <a href="mailto:annisawahyuprakasa@gmail.com" target="__blank" class="my-auto mx-3">
                        <img src="assets/img/logo-gmail-9952.png" alt="gmail" width="30">
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
        document.getElementById("not-allowed").addEventListener("click", showAlert);

        function showAlert() {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Anda tidak bisa mengakses',
                confirmButtonColor: '#ccab90'
            });
        }
    </script>

@endsection
