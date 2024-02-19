<?php

namespace App\Http\Controllers;
use App\Exports\CutisExport;
use Maatwebsite\Excel\Facades\Excel;

class exportCutiController extends Controller
{
    public function export()
    {
        $name = now()->format('d-m-Y');
        return Excel::download(new CutisExport(), "{$name}.xlsx");
    }
}
