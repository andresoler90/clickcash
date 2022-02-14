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
        $this->call([
            CountriesSeeder::class,
            MembershipsSeeder::class,
            KycTypesSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            KycDocumentsSeeder::class,
            TaskDetailsSeeder::class,
            UserBalanceSeeder::class,
            SystemSeeder::class,            
        ]);


    }
}
