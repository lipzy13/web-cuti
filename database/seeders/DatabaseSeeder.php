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

        User::create([
            'nip' => 123456,
            'password' => 'pass'
        ]);

        User::create([
            'nip' => 100001,
            'password' => 'pass'
        ]);

        User::create([
            'nip' => 111111,
            'password' => 'pass'
        ]);

        Pegawai::create([
            'nip' => 123456,
            'nama' => 'Alpha Betta',
        ]);

        Pegawai::create([
            'nip' => 111111,
            'nama' => 'User 1111'
        ]);

        Pegawai::create([
            'nip' => 100001,
            'nama' => 'Song Kosong'
        ]);


        Kontrak::create([
            'nip' => 123456,
            'no_kontrak' => 'XXXX-XXX-XXX-0001',
            'tanggal_mulai' => '2023-6-1',
            'tanggal_selesai' => '2023-12-31',
            'jumlah_cuti' => 6,
            'aktif' => false,
        ]);
        Kontrak::create([
            'nip' => 123456,
            'no_kontrak' => 'XXXX-XXX-XXX-0002',
            'tanggal_mulai' => '2023-7-1',
            'tanggal_selesai' => '2024-1-31',
            'jumlah_cuti' => 4,
            'aktif' => true
        ]);

        Kontrak::create([
            'nip' => 111111,
            'no_kontrak' => 'XXXX-XXX-XXX-0003',
            'tanggal_mulai' => '2023-7-1',
            'tanggal_selesai' => '2024-1-31',
            'jumlah_cuti' => 6,
            'aktif' => true
        ]);

        Kontrak::create([
            'nip' => 100001,
            'no_kontrak' => 'XXXX-XXX-XXX-0004',
            'tanggal_mulai' => '2023-7-1',
            'tanggal_selesai' => '2024-1-31',
            'jumlah_cuti' => 6,
            'aktif' => true
        ]);
    }
}
