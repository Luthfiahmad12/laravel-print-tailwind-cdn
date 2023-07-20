<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Upload;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProcessController extends Controller
{
    public function loginPost(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required'
        ], [
            'name.exists' => 'username tidak ditemukan'
        ]);
        $cred = $request->only('name', 'password');
        // dd($cred);
        if (Auth::guard('web')->attempt($cred)) {
            Alert::success('Berhasil Login');
            return redirect()->route('menu')->with('success', 'Berhasil Login');
        } else {
            Alert::error('Gagal Login', 'Username atau Password salah');
            return redirect()->back()->with('error', 'Username atau password salah');
        }
    }

    public function daftarPost(Request $request)
    {
        $messages = [
            'required' => ':attribute tidak boleh kosong',
            'max' => ':attribute maximal :max karakter',
            'min' => ':attribute minimal :min karakter',
            'unique' => ':attribute sudah digunakan, harap ganti dengan :attribute lain'
        ];
        $this->validate($request, [
            'name' => 'required',
            'email' => ['required', 'unique:users,email'],
            'password' => ['required', 'min:5', 'max:30'],
            'nim' => 'required',
            'prodi' => 'required',
            'gender' => 'required'
        ], $messages);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->nim = $request->nim;
        $user->prodi = $request->prodi;
        $user->gender = $request->gender;
        $save = $user->save();
        // dd($user);
        if ($save) {
            Alert::success('Berhasil registrasi Silahkan Login');
            return redirect()->intended('/');
        }
    }

    public function LogoutUser()
    {
        Auth::guard('web')->logout();
        // Alert::success('Berhasil Logout');
        return redirect()->intended('/');
    }

    public function PostAdmin(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => ['required', 'min:5', 'max:30']
        ], [
            'username.exists' => 'username tidak ditemukan'
        ]);

        $credentials = $request->only('username', 'password');

        // dd($credentials);
        if (Auth::guard('admin')->attempt($credentials)) {
            toast('selamat datang', 'success');
            // Alert::success('Berhasil Login');
            return redirect()->route('index');
        } else {
            Alert::error('username atau password salah');
            return redirect()->back();
        }
    }

    public function LogoutAdmin()
    {
        Auth::guard('admin')->logout();
        return redirect()->intended('/admin/login');
    }

    public function type(Request $request)
    {
        $type = $request->input('type');

        $upload = Upload::create([
            'type' => $type,
            'status' => 'antri'
        ]);

        return redirect()->route('unggah', $upload->id);
    }

    public function documentPost(Request $request, $id)
    {
        $data = Upload::find($id);
        $messages = [
            'mimes' => 'File yang diupload harus Berupa PDF'
        ];
        $validator = Validator::make($request->all(), [
            'document' => 'required|mimes:pdf',
            'user_id' => 'required'
        ], $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('document')) {
            $file = $request->file('document');
            $fileName = time() . '_' . $file->getClientOriginalName();

            // Simpan file PDF ke folder tertentu di storage/app/public
            $file->storeAs('public/uploads/', $fileName);

            // Simpan informasi file ke database, misalnya nama file
            // pastikan Anda memiliki kolom dalam tabel yang sesuai
            // dd($fileName);
            $data->update([
                'document' => $fileName,
                'user_id' => $request->user_id
            ]);
            return redirect()->route('validasi', $data->id);
        }
        return redirect()->back()->with('error', 'Terjadi kesalahan saat mengunggah file PDF.');
    }

    public function delete($id)
    {
        $data = Upload::find($id);
        $data->delete();
        return redirect()->route('menu');
    }

    public function validasiProses($id, Request $request)
    {
        // $data = Upload::find($id);
        $messages = [
            'mimes' => 'File yang diupload harus Berupa PDF'
        ];
        $validator = Validator::make($request->all(), [
            'lembar_bimbingan' => 'required|mimes:pdf',
            'ttd_dospem' => 'required|mimes:pdf',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Mengunggah lembar_bimbingan dan menyimpan nama file dalam kolom 'lembar_bimbingan'
        if ($request->hasFile('lembar_bimbingan')) {
            $file = $request->file('lembar_bimbingan');
            $lembing = time() . '_' . $file->getClientOriginalName();

            // Simpan file PDF ke folder tertentu di storage/app/public
            $file->storeAs('public/uploads/lembar_bimbingan/', $lembing);
        }

        // Mengunggah ttd_dospem dan menyimpan nama file dalam kolom 'ttd_dospem'
        if ($request->hasFile('ttd_dospem')) {
            $file = $request->file('ttd_dospem');
            $ttd_dospem = time() . '_' . $file->getClientOriginalName();

            // Simpan file PDF ke folder tertentu di storage/app/public
            $file->storeAs('public/uploads/ttd_dospem/', $ttd_dospem);
        }

        // dd($lembing, $ttd_dospem);
        $data = Upload::findOrFail($id);
        $data->lembar_bimbingan = $lembing ?? $data->lembar_bimbingan;
        $data->ttd_dospem = $ttd_dospem ?? $data->ttd_dospem;
        $data->save();
        // dd($data);

        Alert::success('File Dokumen Berhasil Diupload');
        return redirect()->route('status', $data->id);
    }

    public function updateStatus(Request $request)
    {
        $status = $request->input('status');
        $id = $request->input('id');

        // Perbarui status dalam database menggunakan Eloquent Query Builder
        $updateResult = Upload::where('id', $id)->update(['status' => $status]);

        if ($updateResult) {
            return response()->json(['message' => 'Status berhasil diperbarui.']);
        } else {
            return response()->json(['message' => 'Gagal memperbarui status.'], 500);
        }
    }

    public function deleteUser($id)
    {
        User::find($id)->delete();
        return redirect()->back();
    }

    public function uploadBukti(Request $request)
    {
        $messages = [
            'mimes' => 'Format file yang diupload berupa jpg, png, atau jpeg'
        ];
        $validator = Validator::make($request->all(), [
            'bukti_pembayaran' => 'required|mimes:jpg,png,jpeg',
            'upload_id' => 'required'
        ], $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran');
            $fileName = time() . '_' . $file->getClientOriginalName();

            // Simpan file PDF ke folder tertentu di storage/app/public
            $file->storeAs('public/uploads/bukti_bayar', $fileName);

            $payment = new Payment();
            $payment->upload_id = $request->upload_id;
            $payment->bukti_pembayaran = $fileName;
            $payment->save();
            // dd($fileName);
            Alert::success('Bukti Pembayaran Berhasil Dikirim');
            return redirect()->route('menu');
        }
    }
}
