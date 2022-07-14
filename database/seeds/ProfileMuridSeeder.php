<?php

use Illuminate\Database\Seeder;

class ProfileMuridSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profile_murids')->insert([
            'idmurid' => 1,
            'photo' => 'fikri.jpeg',
            'lesco' => 0,
            'sekolah' => 'SMKN 10 Jakarta',
            'jenjang' => 'SMA',
            'nisn' => '0123456789',
            'norek' => '0987654321',
            'phone' => '085780245160',
            'alamat' => 'Jalan J No 17/G, Kebon Baru, Tebet, Jakarta Selatan',
            'tentang' => 'Saya adalah seorang pelajar yang selalu haus akan ilmu',
        ]);
    }
}
