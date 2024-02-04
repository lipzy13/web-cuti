<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QueryBuilder;

class Cuti extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_kontrak',
        'kontrak_id',
        'file_path',
    ];

    public function hitungJumlahHariCuti()
{
    return $this->tanggalCuti->count();
}

    public function tanggalCuti() : HasMany
    {
        return $this->hasMany(TanggalCuti::class);
    }
    public function kontrak(): BelongsTo
    {
        return $this->belongsTo(Kontrak::class);
    }

}
