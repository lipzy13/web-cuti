<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\Kontrak;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CutiController extends Controller
{
    //
    public function show(Request $request){

        $filter = $request->input('filter', '');
        $cuti = match ($filter) {
            'last_months' => Cuti::whereDate('created_at', '>=', now()->firstOfMonth()->toDateTimeString())->paginate(5),
            'last_weeks' => Cuti::whereDate('created_at', '>=', now()->subWeek())->paginate(5),
            default => Cuti::paginate(5)
        };
        return view('dashboard.admin.history.index', [
            "cuti" => $cuti
        ]);
    }

    public function destroyCuti(Cuti $cuti) {
        Kontrak::where('no_kontrak', $cuti->no_kontrak)->increment('jumlah_cuti', count($cuti->tanggalCuti));
        Cuti::destroy($cuti->id);
        return Redirect::route('semuaCuti');
    }
}
