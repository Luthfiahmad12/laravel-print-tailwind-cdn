@extends('template')

@section('title', 'Daftar')

@section('content')
    <div class="h-screen relative flex justify-center">
        <form action="{{ route('daftar.post') }}" method="POST" class="my-auto">
            @csrf
            <div class="flex flex-col bg-[#997b70] p-12 rounded-2xl">
                <input type="text" name="name" id="nama"
                    class="rounded-lg p-5 my-1 text-center text-xl text-[#997b70] border-2 focus:outline-none focus:border-[#d3af95] placeholder:text-[#997b70]"
                    placeholder="Nama" required>

                <input type="email" name="email" id="email"
                    class="rounded-lg p-5 my-1 text-center text-xl text-[#997b70] border-2 focus:outline-none focus:border-[#d3af95] placeholder:text-[#997b70]"
                    placeholder="Email" required>
                <input type="password" name="password" id="password" minlength="8"
                    class="rounded-lg p-5 my-1 text-center text-xl text-[#997b70] border-2 focus:outline-none focus:border-[#d3af95] placeholder:text-[#997b70]"
                    placeholder="Password" required>
                <input type="text" name="nim" id="nim"
                    class="rounded-lg p-5 my-1 text-center text-xl text-[#997b70] border-2 focus:outline-none focus:border-[#d3af95] placeholder:text-[#997b70]"
                    placeholder="Nomor Induk Mahasiswa (NIM)" required>
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"></label>
                <select id="countries" name="prodi"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Program Studi</option>
                    <option value="MI">Manajemen Informatika</option>
                    <option value="TI">Teknik Informatik</option>
                    <option value="TS">Teknik Sipil</option>
                    <option value="Ars">Teknik Arsitektur</option>
                    <option value="TM">Teknik Mesin</option>
                </select>
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"></label>
                <select id="countries" name="gender"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Gender</option>
                    <option value="pria">Laki-laki</option>
                    <option value="wanita">Perempuan</option>
                </select>
                <button type="submit"
                    class="bg-[#d3b094] text-white py-2.5 rounded-2xl mt-4 text-xl hover:bg-[#ccab90]">Daftar</button>
                <span class="text-center text-white mt-2">
                    Sudah punya akun?
                    <a href="/" class="text-orange-200 hover:underline">
                        Login
                    </a>
                </span>
            </div>
            <a href="#">
                <h1 class="mt-5 text-center text-2xl text-[#997b70] hover:text-[#7e5e53]">Forget password?</h1>
            </a>
        </form>
    </div>
    <script>
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil Regitrasi!',
                text: '{{ session('success') }}',
                timer: 3000
            });
        @endif
        @if ($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Error',
                html: '{!! implode('<br>', $errors->all()) !!}',
            });
        @endif
    </script>
@endsection
