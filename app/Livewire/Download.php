<?php

namespace App\Livewire;

use App\Models\Cuti;
use App\Models\TanggalCuti;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use function Laravel\Prompts\error;

class Download extends Component
{

    public Cuti $cuti;
    public $cutiList;

    public function mount(Cuti $cuti)
    {
        $this->cuti = $cuti;
        $this->cutiList = DB::table('cutis')->where('kontrak_id', $cuti->kontrak_id)
            ->join('tanggal_cutis','cutis.id', '=', 'tanggal_cutis.cuti_id')
            ->orderBy('tanggal_cuti')->select('cutis.id')->take(50)->get()->unique();
    }

    public function download()
    {
        $array = $this->cutiList->pluck('id');
        $index = $array->search(function($cut) {
            return $cut === $this->cuti->id;
        });
        if ($index !== false) {
            $fileName = sprintf("%02d_%s.pdf", $index + 1, strtoupper($this->cuti->kontrak->user->nama));
            return response()->download(
                'storage/'.$this->cuti->file_path, $fileName
            );
        }
            return back();
    }
    public function render()
    {
        return view('livewire.download');
    }
}
