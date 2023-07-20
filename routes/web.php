<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProcessController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('home');
Route::get('/daftar', function () {
    return view('daftar');
});
Route::get('/admin/login', function () {
    return view('admin.login');
});



route::post('loginpost', [ProcessController::class, 'loginPost'])->name('login.post');
route::post('login-post', [ProcessController::class, 'PostAdmin'])->name('admin.post');
route::post('daftarpost', [ProcessController::class, 'daftarPost'])->name('daftar.post');
route::get('logout', [ProcessController::class, 'LogoutUser'])->name('logout');
route::get('admin/logout', [ProcessController::class, 'LogoutAdmin'])->name('LogoutAdmin');

route::middleware('auth:web')->group(function () {
    Route::get('/menu', [PagesController::class, 'menu'])->name('menu');
    Route::get('/menu-document', function () {
        return view('type');
    });
    route::post('type-post', [ProcessController::class, 'type'])->name('type.post');
    Route::get('/unggah/{id}', [PagesController::class, 'unggah'])->name('unggah');
    Route::post('/{id}/unggah-post', [ProcessController::class, 'documentPost'])->name('documentPost');
    Route::get('/{id}/konfirmasi', [PagesController::class, 'konfirmasi'])->name('konfirmasi');
    Route::get('/{id}/validasi-upload', [PagesController::class, 'validasi'])->name('validasi');
    Route::post('/{id}/batal', [ProcessController::class, 'delete'])->name('delete');
    Route::post('/{id}/validasi-upload', [ProcessController::class, 'validasiProses'])->name('validasiProses');
    Route::get('/{id}/status-cetak', [PagesController::class, 'status'])->name('status');
    Route::post('/{id}/validasi-upload', [ProcessController::class, 'validasiProses'])->name('validasiProses');
    Route::post('/upload-bukti', [ProcessController::class, 'uploadBukti'])->name('upload.bukti');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    route::get('dashboard', [PagesController::class, 'index'])->name('index');
    route::get('daftar-print', [PagesController::class, 'daftarprint'])->name('daftarprint');
    route::post('update-status', [ProcessController::class, 'updateStatus'])->name('updateStatus');
    route::get('daftar-user', [PagesController::class, 'daftaruser'])->name('daftaruser');
    route::post('delete-user/{id}', [ProcessController::class, 'deleteUser'])->name('deleteUser');
});
