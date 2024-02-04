<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModalListContract extends Component
{
    public $kontrak;
    public $cuti;
    public function __construct($kontrak)
    {
        //
        $this->kontrak = $kontrak;
        $this->cuti = $kontrak->cuti;
    }
    public function render(): View
    {
        return view('components.modal-list-contract');
    }
}
