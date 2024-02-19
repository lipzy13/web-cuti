<?php

namespace App\Imports;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use App\Models\Kontrak;
use Maatwebsite\Excel\Concerns\WithValidation;

Carbon::setLocale('id');



class PegawaiImport implements ToCollection, WithHeadingRow, WithCalculatedFormulas, WithValidation
{

    public function rules(): array
    {
        // TODO: Implement rules() method.
        return [
            '3' => Rule::in(['Kontrak', 'Tetap'])
        ];
    }

    public function transformDate($value, $format = 'Y-m-d')
    {
        try {
            return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
        } catch (\ErrorException $e) {
            return \Carbon\Carbon::createFromFormat($format, $value);
        }
    }
    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            if($row[1]){
                if(User::where('nik', $row[1])->exists()){
                    if($row[3] == "Kontrak")
                    {
                        $pegawai = User::where('nik', $row[1])->value('id');
                        Kontrak::create([
                            "user_id" => $pegawai,
                            "no_kontrak" => $row['pkwt_i'],
                            "tanggal_mulai" => Carbon::parse($this->transformDate($row['awal1']))->format('Y-m-d') ,
                            "tanggal_selesai" => Carbon::parse($this->transformDate($row['akhir1']))->format('Y-m-d'),
                            "jumlah_bulan" => $row["jumlah_bulan"],
                            "sisa_cuti" => $row["jumlah_bulan"],
                            "aktif" => Carbon::now()->between(Carbon::parse($this->transformDate($row['awal1']))->format('Y-m-d'), Carbon::parse($this->transformDate($row['akhir1']))->format('Y-m-d')) ? true : false,
                        ]);
                        if($row['no_pkwt_ii']){
                            Kontrak::create([
                                "user_id" => $pegawai,
                                "no_kontrak" => $row['no_pkwt_ii'],
                                "tanggal_mulai" => Carbon::parse($this->transformDate($row['awal2']))->format('Y-m-d') ,
                                "tanggal_selesai" => Carbon::parse($this->transformDate($row['akhir2']))->format('Y-m-d'),
                                "jumlah_bulan" => $row["jumlah_bulan"],
                                "sisa_cuti" => $row["jumlah_bulan"],
                                "aktif" => Carbon::now()->between(Carbon::parse($this->transformDate($row['awal2']))->format('Y-m-d'), Carbon::parse($this->transformDate($row['akhir2']))->format('Y-m-d')) ? true : false,
                            ]);
                        }
                    }
                    elseif($row[3] == "Tetap")
                    {
                        Kontrak::create([
                            "user_id" => $pegawai->id,
                            "no_kontrak" => Carbon::parse($this->transformDate($row['4']))->year(now()->format('Y'))->translatedFormat('F Y') .' - ' . Carbon::parse($this->transformDate($row['4']))->year(now()->format('Y'))->addYear()->format('Y'),
                            "tanggal_mulai" => Carbon::parse($this->transformDate($row['4']))->year(now()->format('Y'))->format('Y-m-d'),
                            "tanggal_selesai" => Carbon::parse($this->transformDate($row['4']))->year(now()->format('Y'))->addYear()->format('Y-m-d'),
                            "jumlah_bulan" => 12,
                            "sisa_cuti" => 12,
                            "aktif" => Carbon::now()->between(Carbon::parse($this->transformDate($row['4']))->year(now()->format('Y'))->format('Y-m-d'), Carbon::parse($this->transformDate($row['4']))->year(now()->format('Y'))->addYear()->format('Y-m-d')) ? true : false,
                        ]);
                    }
                } else {
                    $pegawai = User::create([
                        'nik' => $row[1],
                        'nama' =>  $row[2],
                        'tanggal_masuk' => Carbon::parse($this->transformDate($row['4']))->format('Y-m-d'),
                        'jabatan' => $row[5],
                    ]);
                    if($row[3] == "Kontrak")
                    {
                        Kontrak::create([
                            "user_id" => $pegawai,
                            "no_kontrak" => $row['pkwt_i'],
                            "tanggal_mulai" => Carbon::parse($this->transformDate($row['awal1']))->format('Y-m-d') ,
                            "tanggal_selesai" => Carbon::parse($this->transformDate($row['akhir1']))->format('Y-m-d'),
                            "jumlah_bulan" => $row["jumlah_bulan"],
                            "sisa_cuti" => $row["jumlah_bulan"],
                            "aktif" => Carbon::now()->between(Carbon::parse($this->transformDate($row['awal1']))->format('Y-m-d'), Carbon::parse($this->transformDate($row['akhir1']))->format('Y-m-d')) ? true : false,
                        ]);
                        if($row['no_pkwt_ii']){
                            Kontrak::create([
                                "user_id" => $pegawai,
                                "no_kontrak" => $row['no_pkwt_ii'],
                                "tanggal_mulai" => Carbon::parse($this->transformDate($row['awal2']))->format('Y-m-d') ,
                                "tanggal_selesai" => Carbon::parse($this->transformDate($row['akhir2']))->format('Y-m-d'),
                                "jumlah_bulan" => $row["jumlah_bulan"],
                                "sisa_cuti" => $row["jumlah_bulan"],
                                "aktif" => Carbon::now()->between(Carbon::parse($this->transformDate($row['awal2']))->format('Y-m-d'), Carbon::parse($this->transformDate($row['akhir2']))->format('Y-m-d')) ? true : false,
                            ]);
                        }
                    }
                    elseif($row[3] == "Tetap")
                    {
                        Kontrak::create([
                            "user_id" => $pegawai->id,
                            "no_kontrak" => Carbon::parse($this->transformDate($row['4']))->year(now()->format('Y'))->translatedFormat('F Y') .' - ' . Carbon::parse($this->transformDate($row['4']))->year(now()->format('Y'))->addYear()->format('Y'),
                            "tanggal_mulai" => Carbon::parse($this->transformDate($row['4']))->year(now()->format('Y'))->format('Y-m-d'),
                            "tanggal_selesai" => Carbon::parse($this->transformDate($row['4']))->year(now()->format('Y'))->addYear()->format('Y-m-d'),
                            "jumlah_bulan" => 12,
                            "sisa_cuti" => 12,
                            "aktif" => Carbon::now()->between(Carbon::parse($this->transformDate($row['4']))->year(now()->format('Y'))->format('Y-m-d'), Carbon::parse($this->transformDate($row['4']))->year(now()->format('Y'))->addYear()->format('Y-m-d')) ? true : false,
                        ]);
                    }
                }
            }
        }
    }
    public function headingRow(): int
    {
        return 5;
    }


}
