<?php

namespace App\Livewire;

use Livewire\Component;

class Info extends Component
{
    public $cuti;
    public $kontrak;

    public function render()
    {
        return view('livewire.info');
    }
}
