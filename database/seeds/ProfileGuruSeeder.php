<?php

use Illuminate\Database\Seeder;

class ProfileGuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profile_gurus')->insert([
            'idguru' => 2,
            'photo' => 'raisa.jpg',
            'lesco' => 0,
            'ktp' => '0123456789',
            'norek' => '0987654321',
            'phone' => '085780245160',
            'alamat' => 'Jalan J No 17/G, Kebon Baru, Tebet, Jakarta Selatan',
            'tentang' => 'Saya adalah guru Bahasa Indonesia yang telah berpengalaman lebih dari 5 tahun',
        ]);
    }
}
