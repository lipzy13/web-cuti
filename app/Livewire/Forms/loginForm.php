<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class loginForm extends Form
{
    #[Rule(['required', 'integer'])]
    public $nik = '';

    #[Rule(['required'])]
    public $password = '';
}
