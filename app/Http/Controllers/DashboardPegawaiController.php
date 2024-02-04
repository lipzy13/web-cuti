<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
Carbon::setLocale('id');
use App\Models\Cuti;
use App\Models\User;
use App\Models\Kontrak;
use App\Models\Pegawai;
use Auth;
use Illuminate\Http\Request;

class DashboardPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawai = User::find(auth()->user()->id);
        $kontrak = Kontrak::where('user_id', $pegawai->id)->paginate(3);
        $kontrakAktif = Kontrak::where('user_id', $pegawai->id)->where('aktif', true)->first();

        $pagination = Kontrak::where('user_id', auth()->user()->id)->simplePaginate(3);
        return view('dashboard.pegawai.index',[
            "pegawai" => $pegawai,
            "kontrak" => $kontrak,
            "kontrak_aktif" => $kontrakAktif,
            "pagination" => $pagination,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $kontrak_aktif = Kontrak::where('user_id', auth()->user()->id)->where('aktif', true)->first();
        $cuti = $kontrak_aktif->cuti;
        $durasi = $kontrak_aktif->jumlah_cuti;
        return view('dashboard.pegawai.create',[
            "cuti" => $cuti,
            "kontrak" => $kontrak_aktif,
            "durasi" => $durasi,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pegawai $pegawai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pegawai $pegawai)
    {
        //
    }
}
