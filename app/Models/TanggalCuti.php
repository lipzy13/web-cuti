<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TanggalCuti extends Model
{
    use HasFactory;
    protected $fillable = [ 'tanggal_cuti' ];

    public function cuti()
    {
        return $this->belongsTo(Cuti::class);
    }
}
