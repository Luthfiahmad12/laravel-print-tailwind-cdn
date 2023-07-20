<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PagesController extends Controller
{
    public function menu()
    {
        $data = Upload::with('payment')->where('user_id', Auth::guard('web')->id())->latest()->first();
        // dd($data);
        return view('menu', compact('data'));
    }

    public function index()
    {
        date_default_timezone_set('Asia/Jakarta');
        $currentTime = date('H:i');
        if ($currentTime >= '00:00' && $currentTime < '10:00') {
            $greeting = "Selamat Pagi";
        } elseif ($currentTime >= '10:00' && $currentTime < '15:00') {
            $greeting = "Selamat Siang";
        } elseif ($currentTime >= '15:00' && $currentTime < '18:00') {
            $greeting = "Selamat Sore";
        } else {
            $greeting = "Selamat Malam";
        }
        $data = [
            'antri' => Upload::where('status', 'antri')->count(),
            'proses' => Upload::where('status', 'proses')->count(),
            'selesai' => Upload::where('status', 'selesai')->count()
        ];

        $totalCount = $data['antri'] + $data['proses'] + $data['selesai'];

        // Hitung persentase
        $pendingPercentage = ($totalCount > 0) ? round(($data['antri'] / $totalCount) * 100, 2) : 0;
        $processingPercentage = ($totalCount > 0) ? round(($data['proses'] / $totalCount) * 100, 2) : 0;
        $completedPercentage = ($totalCount > 0) ? round(($data['selesai'] / $totalCount) * 100, 2) : 0;

        return view('admin.index', compact('data', 'greeting', 'pendingPercentage', 'processingPercentage', 'completedPercentage', 'totalCount'));
    }

    public function unggah($id)
    {
        $data = Upload::find($id);
        return view('unggah-dokumen', compact('data'));
    }

    public function konfirmasi($id)
    {
        $data = Upload::find($id);
        return view('konfirmasi', compact('data'));
    }

    public function validasi($id)
    {
        $data = Upload::find($id);
        return view('validasi', compact('data'));
    }

    public function status($id)
    {
        $data = Upload::find($id);
        if ($data) {
            return view('status-percetakan', compact('data'));
        }
        Alert::error('Tidak Bisa Akses Halaman', 'Anda Tidak punya riwayat Cetak');
        return redirect()->back();
    }

    public function daftarprint()
    {
        date_default_timezone_set('Asia/Jakarta');
        $currentTime = date('H:i');
        if ($currentTime >= '00:00' && $currentTime < '10:00') {
            $greeting = "Selamat Pagi";
        } elseif ($currentTime >= '10:00' && $currentTime < '15:00') {
            $greeting = "Selamat Siang";
        } elseif ($currentTime >= '15:00' && $currentTime < '18:00') {
            $greeting = "Selamat Sore";
        } else {
            $greeting = "Selamat Malam";
        }
        $upload = Upload::with('user', 'payment')->get();
        $data = $upload->filter(function ($dokumen) {
            foreach ($dokumen->getAttributes() as $value) {
                if ($value === null) {
                    return false;
                }
            }
            return true;
        });
        return view('admin.daftar-print', compact('data', 'greeting'));
    }

    public function daftaruser()
    {
        date_default_timezone_set('Asia/Jakarta');
        $currentTime = date('H:i');
        if ($currentTime >= '00:00' && $currentTime < '10:00') {
            $greeting = "Selamat Pagi";
        } elseif ($currentTime >= '10:00' && $currentTime < '15:00') {
            $greeting = "Selamat Siang";
        } elseif ($currentTime >= '15:00' && $currentTime < '18:00') {
            $greeting = "Selamat Sore";
        } else {
            $greeting = "Selamat Malam";
        }
        $data = User::all();
        return view('admin.daftar-user', compact('data', 'greeting'));
    }
}
