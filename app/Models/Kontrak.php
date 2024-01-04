<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kontrak extends Model
{
    use HasFactory;
    protected $primaryKey = 'no_kontrak';
    public $incrementing = false;

    public function pegawai() : BelongsTo {
        return $this->belongsTo(Pegawai::class, 'nip' );
    }

    public function cuti() : HasMany {
        return $this->hasMany(Cuti::class, 'no_kontrak', 'no_kontrak');
    }
}
