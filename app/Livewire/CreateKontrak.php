<?php

namespace App\Livewire;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Kontrak;
use Livewire\Component;
use function PHPUnit\Framework\isNull;

class CreateKontrak extends Component
{

    public $nik;
    public $no_kontrak;
    public $tanggal_mulai;
    public $tanggal_selesai;
    public $aktif;
    public $user_id;
    public $sisa_cuti;
    public $jumlah_cuti;



    public function mount(User $pegawai) {
        $this->nik = $pegawai->nik;
        $this->user_id = $pegawai->id;
    }
    public function save() {
        Kontrak::create([
            'no_kontrak' => $this->no_kontrak,
            'user_id' => $this->user_id,
            'tanggal_mulai' => $this->tanggal_mulai,
            'tanggal_selesai' => $this->tanggal_selesai,
            'jumlah_bulan' => Carbon::parse($this->tanggal_mulai)->diffInMonths($this->tanggal_selesai)+1,
            'sisa_cuti' => Carbon::parse($this->tanggal_mulai)->diffInMonths($this->tanggal_selesai)+1,
            'jumlah_cuti' => 0,
            'aktif' => $this->aktif = 'Aktif' ? 1 : 0,
        ]);
        return redirect()->route('admin.edit', $this->user_id);
    }
    public function render()
    {
        return view('livewire.create-kontrak');
    }
}
