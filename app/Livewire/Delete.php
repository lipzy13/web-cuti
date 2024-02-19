<?php

namespace App\Livewire;

use App\Models\Cuti;
use App\Models\Kontrak;
use Livewire\Component;

class Delete extends Component

{
    public Cuti $cuti;

    public function mount($cuti){
        $this->cuti = $cuti;
    }

    public function delete(){
        $target = Cuti::find($this->cuti->id);
        if ($target) {
            $target->delete();
        }
        if ($this->cuti->jenisCuti == 1) {
            Kontrak::where('no_kontrak', $this->cuti->kontrak->no_kontrak)->decrement('jumlah_cuti', 1);
            Kontrak::where('no_kontrak', $this->cuti->kontrak->no_kontrak)->increment('sisa_cuti', 1);
        }
        return redirect()->to('/admin/riwayat');
    }
    public function render()
    {
        return view('livewire.delete');
    }
}
