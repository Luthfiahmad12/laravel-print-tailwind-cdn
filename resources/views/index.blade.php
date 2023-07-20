@extends('template')

@section('title', 'Selamat Datang')

@section('content')
    <div class="h-screen relative flex justify-center">
        <form action="{{ route('login.post') }}" method="POST" enctype="multipart/form-data" class="my-auto">
            @csrf
            <div class="flex flex-col bg-[#997b70] p-12 rounded-2xl">
                <input type="text" name="name" id="email"
                    class="rounded-lg p-5 my-1 text-center text-xl text-[#997b70] border-2 focus:outline-none focus:border-[#d3af95] placeholder:text-[#997b70]"
                    placeholder="Username" required>
                <input type="password" name="password" id="password"
                    class="rounded-lg p-5 my-1 text-center text-xl text-[#997b70] border-2 focus:outline-none focus:border-[#d3af95] placeholder:text-[#997b70]"
                    placeholder="Password" required>
                <button type="submit"
                    class="bg-[#d3b094] text-white py-2.5 rounded-2xl mt-4 text-xl hover:bg-[#ccab90]">Login</button>
                <span class="text-center text-white mt-2">
                    Belum punya akun?
                    <a href="/daftar" class="text-orange-200 hover:underline">
                        Daftar
                    </a>
                </span>
            </div>
            <a href="forget-password.php">
                <h1 class="mt-5 text-center text-2xl text-[#997b70] hover:text-[#7e5e53]">Forget password?</h1>
            </a>
            <br>
            <a href="admin/login" target="__blank">
                <h1 class="mt-5 text-center text-2xl text-[#997b70] hover:text-[#7e5e53]"><strong>ADMIN LOGIN</strong>
                </h1>
            </a>
        </form>
    </div>
@endsection
