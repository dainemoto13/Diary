<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // 11/18追加
        $this->call(UsersTableSeeder::class);
        $this->call(DiariesTableSeeder::class);
    }
}
