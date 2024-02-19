<?php

namespace App\Exports;

use App\Models\Cuti;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CutisExport implements FromQuery, WithMapping, WithHeadings, WithCustomStartCell, ShouldAutoSize
{
    /**
     * @param Cuti $cuti
     */
    public function query()
    {
        return Cuti::query()->whereMonth('created_at', now()->month);
    }
    public function map($cuti): array
    {
        return [
            $cuti->id,
            $cuti->kontrak->no_kontrak,
            $cuti->kontrak->user->nama,
            $cuti->kontrak->user->nik,
            $cuti->tanggalCuti->pluck('tanggal_cuti')->implode(', ')
        ];
    }

    public function headings(): array
    {
        return [
            'NO',
            'No_kontrak',
            'nama_pegawai',
            'NIP',
            'Tanggal_cuti'
        ];
    }

    public function startCell(): string
    {
        return 'B4';
    }
}
