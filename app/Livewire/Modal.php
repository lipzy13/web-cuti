<?php

namespace App\Livewire;

use App\Models\Kontrak;
use Livewire\Component;

class Modal extends Component
{

    public $kontrak;
    public $no_kontrak;
    public $aktif;
    public $tanggal_mulai;
    public $tanggal_selesai;
    public $sisa_cuti;

    public function  mount($kontrak){
        $this->kontrak = $kontrak;
        $this->no_kontrak = $kontrak->no_kontrak;
        $this->aktif = $kontrak->aktif;
        $this->tanggal_mulai = $kontrak->tanggal_mulai;
        $this->tanggal_selesai = $kontrak->tanggal_selesai;
        $this->sisa_cuti = $kontrak->sisa_cuti;
    }

    public function save(){
        $new_kontrak = Kontrak::find($this->kontrak->id);
        $new_kontrak->no_kontrak = $this->no_kontrak;
        $new_kontrak->aktif = $this->aktif;
        $new_kontrak->tanggal_mulai = $this->tanggal_mulai;
        $new_kontrak->tanggal_selesai = $this->tanggal_selesai;
        $new_kontrak->sisa_cuti = $this->sisa_cuti;

        $new_kontrak->save();
        return redirect()->route('admin.edit', $this->kontrak->user_id);
    }
    public function render()
    {
        return view('livewire.modal', );
    }
}
