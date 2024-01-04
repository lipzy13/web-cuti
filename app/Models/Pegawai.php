<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pegawai extends Model
{
    use HasFactory;

    protected $primaryKey = 'nip';
    public $incrementing = false;

    public function user() : HasOne {
        return $this->hasOne(User::class, 'nip'); 
    }
    public function kontrak(): HasMany{
        return $this->hasMany(Kontrak::class, 'nip', 'nip');
    }
}
