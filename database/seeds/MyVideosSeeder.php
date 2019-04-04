<?php

use Illuminate\Database\Seeder;

class MyVideosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('myvideos')->insert([
        	'iduser' => '1',
            'guru' => 'Muhammad Fikri Hadian',
            'judul' => 'Belajar Aljabar',
            'deskripsi' => 'Belajar Aljabar dengan teknik yang mudah dimengerti',
            'video' => 'https://www.youtube.com/watch?v=xbe_Logx4LE',
            'sampul' => 'aljabar.jpeg',
            'lesco' => '10',
        ]);    
    }
}
