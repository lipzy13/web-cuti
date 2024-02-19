<?php

namespace App\Http\Controllers;

use App\Models\Kontrak;

class cutiKhususController extends Controller
{
    public function index()
    {
        if(!Kontrak::where('user_id', auth()->user()->id)->where('aktif', true)->get()->count()){
            return redirect('/dashboard');
        } else {
            $kontrak_aktif = Kontrak::where('user_id', auth()->user()->id)->where('aktif', true)->first();
            $cuti = $kontrak_aktif->cuti;
            $durasi = $kontrak_aktif->jumlah_cuti;
            return view('dashboard.pegawai.khusus', [
                "kontrak" => $kontrak_aktif,
            ]);
        }
    }
}
