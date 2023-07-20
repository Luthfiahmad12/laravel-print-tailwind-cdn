@extends('template')
@section('title', 'Status')
@section('content')
    <nav class="w-full">
        <div class="flex justify-between py-4 px-4 md:px-20">
            <div>
                <a href="/menu">
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
            <h1 class="text-center text-3xl text-[#997b70] mb-6">Status Percetakan</h1>
            <div class="flex justify-around gap-10 bg-[#997b70] p-12 rounded-2xl">
                <div class="flex gap-10">
                    <div>
                        <div class="flex justify-center">
                            <div class="relative mb-0">
                                @if ($data->status == 'antri')
                                    <div class="w-4 h-4 rounded-full bg-green-500 absolute top-[33%] right-3 z-10"></div>
                                @endif
                                <ion-icon name="time-outline" class="text-white text-8xl my-16 cursor-pointer"
                                    id="antri">
                                </ion-icon>
                            </div>
                        </div>
                        <div class="invisible -mt-7 text-lg text-center {{ $data->status == 'antri' ? 'text-white' : 'text-slate-800' }}"
                            id="text-antrian">
                            Dokumen masuk <br> antrian.
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-center">
                            <div class="relative mb-0">
                                @if ($data->status == 'proses')
                                    <div class="w-4 h-4 rounded-full bg-green-500 absolute top-[33%] right-2 z-10"></div>
                                @endif
                                <ion-icon name="print" class="text-white text-8xl my-16 cursor-pointer" id="proses"
                                    title="pppp"></ion-icon>
                            </div>
                        </div>
                        <div class="invisible -mt-7 text-lg text-center {{ $data->status == 'proses' ? 'text-white' : 'text-slate-800' }}"
                            id="text-proses">
                            Dokumen sedang <br> di proses cetak.
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-center">
                            <div class="relative mb-0">
                                @if ($data->status == 'selesai')
                                    <div class="w-4 h-4 rounded-full bg-green-500 absolute top-[33%] right-1 z-10"></div>
                                @endif
                                <ion-icon name="checkbox" class="text-white text-8xl my-16 cursor-pointer" id="selesai">
                                </ion-icon>
                            </div>
                        </div>
                        <div class="invisible -mt-7 text-lg text-center {{ $data->status == 'selesai' ? 'text-white' : 'text-slate-800' }}"
                            id="text-selesai">
                            Dokumen sudah <br> selesai dicetak.
                        </div>
                    </div>
                </div>
                <!-- Garis Vertikal -->
                <div class="divide-x-0 "></div>

                @if (!empty($data->payment))
                    <div class="flex flex-col justify-center items-center">
                        <h1 class="text-white text-xl mb-3">Bukti Pembayaran</h1>
                        {{-- <div id="file-name" class="text-green-500 mt-2"></div> --}}
                        <a href="{{ asset('storage/uploads/bukti_bayar/' . $data->payment->bukti_pembayaran) }}"
                            class="text-green-500 mt-2" target="__blank">{{ $data->payment->bukti_pembayaran }}</a>
                    </div>
                @else
                    <div class="flex flex-col justify-center items-center">
                        <h1 class="text-white text-xl mb-3">Upload Bukti Pembayaran</h1>
                        <form action="{{ route('upload.bukti') }}" method="POST" enctype="multipart/form-data"
                            class="flex items-center flex-col">
                            @csrf
                            <div class="relative">
                                <input type="hidden" name="upload_id" value="{{ $data->id }}">
                                <input type="file" name="bukti_pembayaran" id="file" required
                                    class="opacity-0 absolute w-full h-full left-0 top-0 cursor-pointer"
                                    onchange="displayFileName()">
                                <label for="file"
                                    class="px-6 py-3 bg-gray-500 text-white rounded-full cursor-pointer hover:bg-gray-600 transition-colors">
                                    Pilih File
                                </label>
                            </div>
                            <div id="file-name" class="text-green-500 mt-2"></div>
                            <button type="submit"
                                class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition-colors">
                                Kirim
                            </button>
                        </form>
                    </div>
                @endif
            </div>
            <a href="#">
                <h1 class="mt-2 mb-1 text-center text-2xl text-gray-800">Contact Person</h1>
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
                    location.href = 'process/logout.php';
                }
            })
        });
    </script>
    <script>
        $(document).ready(() => {
            let showText1 = showText2 = showText3 = false;
            $('#antri').on('click', () => {
                if (showText1) {
                    $('#text-antrian').addClass('invisible');
                    showText1 = false;
                } else {
                    $('#text-antrian').removeClass('invisible');
                    showText1 = true;
                }
            });
            $('#proses').on('click', () => {
                if (showText2) {
                    $('#text-proses').addClass('invisible');
                    showText2 = false;
                } else {
                    $('#text-proses').removeClass('invisible');
                    showText2 = true;
                }
            });
            $('#selesai').on('click', () => {
                if (showText3) {
                    $('#text-selesai').addClass('invisible');
                    showText3 = false;
                } else {
                    $('#text-selesai').removeClass('invisible');
                    showText3 = true;
                }
            });
        });
    </script>
    <script>
        function displayFileName() {
            const fileInput = document.getElementById('file');
            const fileNameDisplay = document.getElementById('file-name');

            if (fileInput.files.length > 0) {
                fileNameDisplay.textContent = fileInput.files[0].name;
            } else {
                fileNameDisplay.textContent = '';
            }
        }
    </script>
    <script>
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
