<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Cuti;
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

        Kontrak::create([
           'id' => 1,
           'user_id' => 1,
           'no_kontrak' => 'XXXX-XXXX-XXXX-0001',
            'tanggal_mulai' => '2023-02-01'
        ]);
    }
}
