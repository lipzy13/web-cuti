<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Cuti;
use App\Models\jenisCuti;
use App\Models\Kontrak;
use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        jenisCuti::create([
            'nama_cuti' => 'Tes',
            'jumlah_hari' => 1
        ]);
        jenisCuti::create([
            'nama_cuti' => 'Tes 2',
            'jumlah_hari' => 2
        ]);
    }
}
