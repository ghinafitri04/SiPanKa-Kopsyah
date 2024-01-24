<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mendapatkan ID dari role tertentu (misalnya, 'Admin')
        $adminProvinsiId = DB::table('roles')->where('role_name', 'Admin Provinsi')->value('id');
        $adminKabKotId = DB::table('roles')->where('role_name', 'Admin Kabupaten Kota')->value('id');
        // Menyisipkan data dummy ke dalam tabel admins
        DB::table('admins')->insert([
            'id_role' => $adminProvinsiId,
            'username' => 'Admin Provinsi',
            'password' => Hash::make('provinsi1'),
            'nama_instansi' => 'Dinas Provinsi Sumatera Barat',
            'region' => 'Sumatera Barat',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('admins')->insert([
            'id_role' => $adminKabKotId,
            'username' => 'Admin Padang',
            'password' => Hash::make('padang'),
            'nama_instansi' => 'Dinas Koperasi',
            'region' => 'Kota Padang',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // ...

        dd('Seeder Admin berhasil dijalankan', $adminProvinsiId, $adminKabKotId);

        // ...


        // Tambahkan data dummy lainnya sesuai kebutuhan Anda
    }
}
