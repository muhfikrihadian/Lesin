<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
         [
           'name' => 'Siswa Pertama',
           'username' => 'Siswa_pertama',
           'email' => 'siswa1@gmail.com',
           'password' => bcrypt('siswa123'),
           'role' => 'Murid',
         ],
         [
           'name' => 'Guru Pertama',
           'username' => 'Guru_pertama',
           'email' => 'guru1@gmail.com',
           'password' => bcrypt('guru123'),
           'role' => 'Guru',
         ]
     ]);
    }
}
