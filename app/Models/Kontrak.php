<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QueryBuilder;

class Kontrak extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','no_kontrak', 'tanggal_mulai', 'tanggal_selesai', 'sisa_cuti', 'aktif', 'jumlah_cuti', 'jumlah_bulan'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cuti() : HasMany
    {
        return $this->hasMany(Cuti::class);
    }

}
