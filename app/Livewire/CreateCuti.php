<?php

namespace App\Livewire;

use App\Models\Cuti;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Kontrak;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use PhpOffice\PhpWord\TemplateProcessor;


class CreateCuti extends Component
{
    use WithFileUploads;
    public $no_kontrak = '';
    public $kontrak_id = '';
    public $tanggal_mulai;
    public $pegawai_id;
    public $tanggal_selesai;
    public $kontrak;


    #[Validate([
        'tanggal' => 'required',
        'tanggal.*' => 'required|after:tanggal_mulai|before:tanggal_selesai|unique:tanggal_cutis,tanggal_cuti',
    ], message: [
        'required' => 'Masukkan tanggal',
        'after' => 'Tanggal diluar jangka kontrak.',
        'before' => 'Tanggal diluar jangka kontrak',
        'unique'=> 'Tiap tanggal harus berbeda',
    ],attribute: [
        'tanggal.*'=>'tanggal'
    ])]
    #[Validate('required', message: 'Masukkan Tanggal')]
    public $tanggal = [];
    public $tanggal_clean = [];

    #[Validate('required', message: 'Masukkan file surat (dengan ekstensi .pdf)')]
    #[Validate('mimes:pdf', message: 'File harus berformat pdf')]
    public $file_path;

    public function mount($kontrak)
    {
        $this->no_kontrak = $kontrak->no_kontrak;
        $this->kontrak_id = $kontrak->id;
        $this->tanggal_mulai = $kontrak->tanggal_mulai;
        $this->tanggal_selesai = $kontrak->tanggal_selesai;
        $this->pegawai_id = $kontrak->user->id;
        $this->kontrak = $kontrak;
    }

    public function addTanggal()
    {
        $this->tanggal[] = '';
    }

    public function removeTanggal($index)
    {
            // Remove element at the specified index
        if ($index === 0) {
            return;
        }
            unset($this->tanggal[$index]);

            // Re-index the array
            $this->tanggal = array_values($this->tanggal);
    }
    public function save () {
        $this->validate();
        // Mengecek apakah jumlah cuti cukup
        $availableCuti =$this->kontrak->sisa_cuti;
        if ($availableCuti >= count($this->tanggal)) {
            $cuti = Cuti::create([
                'no_kontrak' => $this->no_kontrak,
                'kontrak_id' => $this->kontrak_id,
                'file_path' => $this->file_path->store('surat'),
                'jenisCuti' => 1,
            ]);
          foreach ($this->tanggal as $tanggal) {
                $cuti->tanggalCuti()->create(['tanggal_cuti' => $tanggal]);
                Kontrak::where('no_kontrak', $this->no_kontrak)->decrement('sisa_cuti', 1);
                Kontrak::where('no_kontrak', $this->no_kontrak)->increment('jumlah_cuti', 1);
            }
            return redirect('/dashboard/create');

        }
            return redirect()->back();
    }



    public function download() {
        Carbon::setLocale('id');
        foreach ($this->tanggal as $tanggal)
        {
            $this->tanggal_clean[] = Carbon::parse($tanggal)->translatedFormat('d-m-Y');
        }
        $pegawai = User::find($this->pegawai_id);
        $name= $pegawai->nama;
        $nik = $pegawai->nik;
        $jabatan = $pegawai->jabatan;
        $year1 = Carbon::parse($pegawai->kontrak->where('aktif',1)->value('tanggal_mulai'))->translatedFormat('Y');
        $year2 = Carbon::parse($pegawai->kontrak->where('aktif',1)->value('tanggal_selesai'))->translatedFormat('Y');
        $tanggal_masuk = Carbon::parse($pegawai->tanggal_masuk)->translatedFormat('j F Y') ;
        $template = new TemplateProcessor(storage_path('app/template.docx'));
        $template->setValue('name', $name);
        $template->setValue('nik', $nik);
        $template->setValue('jabatan', $jabatan);
        $template->setValue('tanggal_cuti', implode(",", $this->tanggal_clean));
        $template->setValue('tanggal_sekarang', now()->translatedFormat('j F Y'));
        $template->setValue('tanggal', now()->translatedFormat('j-m-y'));
        $template->setValue('jmlh_hari', count($this->tanggal));
        $template->setValue('year1', $year1);
        $template->setValue('year2', $year2);
        $template->setValue('tanggal_masuk', $tanggal_masuk);
        $template->setValue('jumlah_bulan', strval($this->kontrak->jumlah_bulan));
        $template->setValue('jumlah_cuti', ($this->kontrak->jumlah_cuti === 0 ? ' 0 ' : $this->kontrak->jumlah_cuti));
        $template->setValue('sisa_cuti', strval($this->kontrak->sisa_cuti));

        $filename = 'surat_cuti.docx';
        $template->saveAs(public_path($filename));
        return response()->download(
            public_path($filename), $filename
        );
    }
    public function render()
    {
        return view('livewire.create-cuti');
    }
}
