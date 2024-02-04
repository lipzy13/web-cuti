<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pegawai extends Model
{
    use HasFactory;

    protected $fillable = ['nik', 'nama'];
    protected $guarded = ['id'];
    public function kontrak()
    {
        return $this->hasMany(Kontrak::class);
    }
    public function scopeNama(Builder $query, string $nama) : Builder{
        return $query->where('nama', 'LIKE', '%'.$nama.'%');
    }
}
