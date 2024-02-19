<?php

namespace App\Livewire;

use App\Models\Cuti;
use App\Models\jenisCuti;
use App\Models\Kontrak;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use PhpOffice\PhpWord\TemplateProcessor;

class CreateCutiKhusus extends Component
{
    use WithFileUploads;
    public $no_kontrak = '';
    public $kontrak_id = '';
    public $tanggal_mulai;
    public $pegawai_id;
    public $tanggal_selesai;
    public $kontrak;
    public $tanggal = [];
    public $tanggal_raw = [];

    #[Validate([
        'tanggal_awal' => 'required|after:tanggal_mulai|before:tanggal_selesai',
    ], message: [
        'required' => 'Masukkan tanggal',
        'after' => 'Tanggal diluar jangka kontrak.',
        'before' => 'Tanggal diluar jangka kontrak',
    ])]
    public $tanggal_awal;
    public $jenis_cuti;
    public $lama_hari;

    #[Validate('required', message: 'Masukkan file surat (dengan ekstensi .pdf)')]
    #[Validate('mimes:pdf')]
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

    public function save () {
        $this->validate();
            $cuti = Cuti::create([
                'no_kontrak' => $this->no_kontrak,
                'kontrak_id' => $this->kontrak_id,
                'file_path' => $this->file_path->store('surat'),
                'jenisCuti' => 2
            ]);
            $count = 0;
            for ($i = 0; $count < jenisCuti::find($this->jenis_cuti)->jumlah_hari; $i++) {
                $nextDate = Carbon::parse($this->tanggal_awal)->addDays($i);
                if ($nextDate->isWeekend()) {
                    continue;
                }
                $count++;
                $this->tanggal_raw [] = $nextDate;
            }

            foreach ($this->tanggal_raw as $tanggal) {
                $cuti->tanggalCuti()->create(['tanggal_cuti' => $tanggal]);
            }
        return redirect('/dashboard');
    }



    public function download() {
        Carbon::setLocale('id');
        $count = 0;
        for ($i = 0; $count < jenisCuti::find($this->jenis_cuti)->jumlah_hari; $i++) {
            $nextDate = Carbon::parse($this->tanggal_awal)->addDays($i);
            if ($nextDate->isWeekend()) {
                continue;
            }
            $count++;
            $this->tanggal [] = $nextDate->translatedFormat('j F Y');
        }
        $tanggal_clean = [reset($this->tanggal), end($this->tanggal)];
        $pegawai = User::find($this->pegawai_id);
        $name= $pegawai->nama;
        $nik = $pegawai->nik;
        $jenis_cuti = jenisCuti::whereId($this->jenis_cuti)->value('nama_cuti');
        $jabatan = $pegawai->jabatan;
        $year1 = Carbon::parse($pegawai->kontrak->where('aktif',1)->value('tanggal_mulai'))->translatedFormat('Y');
        $year2 = Carbon::parse($pegawai->kontrak->where('aktif',1)->value('tanggal_selesai'))->translatedFormat('Y');
        $tanggal_masuk = Carbon::parse($pegawai->tanggal_masuk)->translatedFormat('j F Y') ;
        $template = new TemplateProcessor(storage_path('app/templateKhusus.docx'));
        $template->setValue('name', $name);
        $template->setValue('nik', $nik);
        $template->setValue('jabatan', $jabatan);
        $template->setValue('tanggal_cuti', implode(" - ", $tanggal_clean));
        $template->setValue('tanggal_sekarang', now()->translatedFormat('j F Y'));
        $template->setValue('tanggal', now()->translatedFormat('j-m-y'));
        $template->setValue('jumlah_hari', jenisCuti::find($this->jenis_cuti)->jumlah_hari);
        $template->setValue('year1', $year1);
        $template->setValue('year2', $year2);
        $template->setValue('jenis_cuti', $jenis_cuti);
        $template->setValue('tanggal_masuk', $tanggal_masuk);

        $filename = 'surat_cuti.docx';
        $template->saveAs(public_path($filename));
        return response()->download(
            public_path($filename), $filename
        );
    }
    public function render()
    {
        return view('livewire.create-cuti-khusus');
    }
}
