<?php

use Illuminate\Database\Seeder;

class MembershipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('memberships')->insert([
            'id'             => 1,
            'name'           => 'Basic',
            'description'    => 'Acceso a la red comercial',
            'amount'         => 25,
            'access_product' => 0,
        ]);
        DB::table('memberships')->insert([
            'id'             => 2,
            'name'           => 'Standard',
            'description'    => 'Acceso a la red comercial + acceso al producto+ acceso a bono salario',
            'amount'         => 175,
            'access_product' => 0,
        ]);
        DB::table('memberships')->insert([
            'id'             => 3,
            'name'           => 'Plus',
            'description'    => 'Acceso a la red comercial ',
            'amount'         => 500,
            'access_product' => 0,
        ]);
        DB::table('memberships')->insert([
            'id'             => 4,
            'name'           => 'Special',
            'description'    => 'acceso a la red + acceso al producto + acceso trading+ acceso a    bono',
            'amount'         => 1000,
            'access_product' => 0,
        ]);
    }
}
