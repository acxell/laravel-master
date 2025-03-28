<?php

namespace Database\Seeders;

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
        $this->call(CreateAdminUserSeeder::class);
        $this->call(MenusTableSeeder::class);
        // $this->call(MataKuliahAPISeeder::class);
        // $this->call(MahasiswaAPISeeder::class);
        // $this->call(KuliahAPISeeder::class);
        // $this->call(RuangAPISeeder::class);
        // $this->call(ProdiAPISeeder::class);
        // $this->call(PegawaiAPISeeder::class);
        // $this->call(UserAPISeeder::class);
    }
}
