<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order')->insert([
            'nmr_murid' => '07768732642',
            'photo_murid' => 'fikri.jpeg',
            'studentname' => 'Siswa Pertama',
            'teachername' => 'Guru Pertama',
            'kategori_pelajaran' => 'Aljabar',
            'pelajaran' => 'Matematika',
            'deskripsi' => 'Saya kesulitan belajar aljabar :(',
            'durasi' => '2',
            'lesco' => '200',
            'alamat' => 'Jalan Batu Tumbuh No.20 Kramat Jati, Jakarta Timur',
            'status' => 'Waiting',
            'jenjang' => 'SMA',
            'type' => 'Offline',
        ],
        [
            'nmr_murid' => '077687326421',
            'photo_murid' => 'fikri.jpeg',
            'studentname' => 'Siswa Pertama',
            'teachername' => 'Guru Pertama',
            'kategori_pelajaran' => 'Advertising',
            'pelajaran' => 'Bahasa Inggris',
            'deskripsi' => 'Saya kesulitan belajar advertising :(',
            'durasi' => '1',
            'lesco' => '100',
            'alamat' => '',
            'status' => 'Waiting',
            'jenjang' => 'SMA',
            'type' => 'Online',
        ]);
    }
}
