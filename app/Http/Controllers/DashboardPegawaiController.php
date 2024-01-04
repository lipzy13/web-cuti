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
        $pegawai = Pegawai::find(auth()->user()->pegawai->nip);
        $kontrak = $pegawai->kontrak;
        $kontrak_aktif = $kontrak->where('aktif', true)->first();
        $cuti = Cuti::where('no_kontrak', $kontrak_aktif->no_kontrak)->get();
        $durasi = Cuti::where('no_kontrak', $kontrak_aktif->no_kontrak)->sum('lama_hari');
        return view('dashboard.pegawai.index',[
            "pegawai" => $pegawai,
            "durasi" => $durasi,
            "kontrak" => $kontrak,
            "kontrak_aktif" => $kontrak_aktif,
            "cuti" => $cuti,
            "tes" => Kontrak::find('XXXX-XXX-XXX-0004')->cuti
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kontrak = Pegawai::where('nip', auth()->user()->pegawai->nip)->get();
        $kontrak_aktif = Kontrak::where('nip', auth()->user()->pegawai->nip)->where('aktif', true)->first();
        $cuti = Cuti::where('no_kontrak', $kontrak_aktif->no_kontrak)->get();
        $durasi = Cuti::where('no_kontrak', $kontrak_aktif->no_kontrak)->sum('lama_hari');
        return view('dashboard.pegawai.create',[
            "pegawai" => $kontrak,
            "cuti" => $cuti,
            "kontrak" => $kontrak_aktif,
            "durasi" => $durasi
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_kontrak' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
        ]);

        if ($request->tanggal_mulai > $request->tanggal_selesai) {
            return back()->with('submitError', 'Tanggal mulai lebih dahulu dibanding tanggal selesai');
        }

        if ($request->tanggal_mulai < date('Y-m-d') || $request->tanggal_selesai < date('Y-m-d')) {
            return back()->with('submitError', 'Tanggal lebih lama dari tanggal sekarang');
        }

        $lama_hari = Carbon::parse($request->tanggal_mulai)
        ->diffInDays(Carbon::parse($request->tanggal_selesai)) + 1;

        $jatah_cuti = Kontrak::where('no_kontrak', $request->no_kontrak)->value('jumlah_cuti');

        if($jatah_cuti<=$lama_hari) {
            return back()->with('submitError', 'Jatah cuti tidak mencukupi');
        }

        Cuti::create([
            'no_kontrak' => $request->no_kontrak,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'lama_hari' => $lama_hari,
        ]);
        Kontrak::where('no_kontrak', $request->no_kontrak)->decrement('jumlah_cuti', $lama_hari);

        return redirect('/dashboard');
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
