<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cuti extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_kontrak',
        'tanggal_mulai',
        'tanggal_selesai',
        'lama_hari'
    ];
    public function cuti() : BelongsTo {
        return $this->belongsTo(Kontrak::class, 'no_kontrak', 'no_kontrak');
    }
}
