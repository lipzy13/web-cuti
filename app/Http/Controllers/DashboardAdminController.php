<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kontrak;
use Illuminate\Http\Request;
use App\Imports\PegawaiImport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class DashboardAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $nama = $request->input('search');
        $pegawai = User::when(
            $nama,
            fn ($query, $title)=> $query->nama($nama)
        )->orderBy('nama', 'asc')->paginate(5)->setPath ( '' );
        $pagination = $pegawai->appends ( array (
            'q' => $request->input('search')
        ) );
        $kontrak = Kontrak::where('aktif', true)->select('no_kontrak');
        return view('dashboard.admin.index',[
            'pegawai' => $pegawai,
            'kontrak' => $kontrak,
        ]);
    }
    public function pegawaiimportexcel(Request $request){
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('DataPegawai', $namaFile);
        Excel::import(new PegawaiImport, public_path('/DataPegawai/'.$namaFile));
        return redirect('admin');
    }

    public function resetPass(string $id){
        $user = User::find($id);
        $user->update(['password' => bcrypt('pass')]);
        return redirect('/admin');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'nik' => 'required|unique:users,nik',
            'jabatan'=> 'required',
            'tanggal_masuk' => 'required'
        ],
        [
            'nik.unique'=>'NIK sudah ada',
            '*.required' => 'Masukkan data dengan benar'
        ]);

        User::create($validatedData);
        return redirect()->route('admin.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pegawai = User::find($id);
        return view('dashboard.admin.edit', [
            'pegawai' => $pegawai,
            'data' => $pegawai
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $pegawai)
    {
        //
        $validatedData = $request->validate([
            'nama' => 'required',
            'nik' => 'bail|required|unique:users,nik',
        ],[
            'nik.unique' => 'NIP sudah terpakai'
        ]);
        $pega = User::find($pegawai);
        $pega->update(
            $validatedData
        );
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.index');
    }
    public function destroyKontrak(string $id)
    {
        $kontrak = Kontrak::find($id);
        $pegawai = $kontrak->user_id;
        $kontrak->delete();
        return redirect()->route('admin.edit', $pegawai);
    }
}
