<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Mahasiswa')->insert([
            'nim' => '1941720142',
            'nama' => 'Reynaldi Ramadhani',
            'kelas' => 'TI2D',
            'jurusan' => 'JTI',
            'no_handphone' => '08123456789',
        ]);
    }
}
