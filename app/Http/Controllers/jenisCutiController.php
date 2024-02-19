<?php

namespace App\Http\Controllers;

use App\Models\jenisCuti;
use Illuminate\Http\Request;

class jenisCutiController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.jenisCuti.index');
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_cuti' => 'required',
            'jumlah_hari' => 'gt:0|required'
        ]);
        jenisCuti::create($data);
        return redirect('/admin/cuti-khusus');
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nama_cuti' => 'required',
            'jumlah_hari' => 'required|gt:0'
        ]);

        $cuti = jenisCuti::find($id);
        $cuti->update($data);
        return redirect('/admin/cuti-khusus');
    }

    public function destroy($id)
    {
        $cuti = jenisCuti::find($id);
        $cuti->delete();
        return redirect()->route('cuti-khusus.index');
    }
}
