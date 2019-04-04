<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
          UsersTableSeeder::class,
          ProfileGuruSeeder::class,
          MyVideosSeeder::class,
          OrderSeeder::class,
          ProfileMuridSeeder::class,
          VideosSeeder::class,
        ]);
    }
}
