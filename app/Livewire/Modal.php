<?php

namespace App\Livewire;

use App\Models\Kontrak;
use Livewire\Component;

class Modal extends Component
{
    public function render()
    {
        return view('livewire.modal', [
            'popup' => Kontrak::where('nip', auth()->user()->nip)->orderBy('tanggal_mulai', 'asc')->get()
        ]);
    }
}
