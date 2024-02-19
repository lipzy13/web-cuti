<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CutiKhusus extends Component
{
    public $cuti;
    public function __construct($cuti)
    {
        $this->cuti = $cuti;
    }

    public function render(): View
    {
        return view('components.cuti-khusus');
    }
}
