<?php

namespace App\Livewire;

use App\Models\Kontrak;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use ZipArchive;
use Livewire\Component;

class DownloadAll extends Component
{
    public Kontrak $kontrak;
    public $cutiList;


    public function mount(Kontrak $kontrak){
        $this->kontrak = $kontrak;
        $this->cutiList = DB::table('cutis')->where('kontrak_id', $this->kontrak->id)
            ->join('tanggal_cutis','cutis.id', '=', 'tanggal_cutis.cuti_id')
            ->orderBy('tanggal_cuti')->select( 'cutis.file_path')->take(50)->get()->unique();
    }

    public function download() {
        $zip = new ZipArchive;
        $nama_file = str_replace('/', '-', $this->kontrak->no_kontrak);
        $filename = "{$nama_file}.zip";

        $zipFileName = 'myNewFile.zip';
        $filePaths = $this->cutiList->pluck('file_path')->toArray();

        // Create a temporary zip file
        if ($zip->open($zipFileName, ZipArchive::CREATE | ZipArchive::OVERWRITE)){
            foreach ($filePaths as $index=>$filePath) {
                $zip->addFile('storage/'.$filePath);
                $filenames = sprintf("%02d_%s.pdf", $index + 1, strtoupper($this->kontrak->user->nama));
                $zip->renameName('storage/'.$filePath, $filenames);
            }

        }
        $zip->close();

        return response()->download("{$zipFileName}", $filename);
    }

    public function render()
    {
        return view('livewire.download-all');
    }
}
