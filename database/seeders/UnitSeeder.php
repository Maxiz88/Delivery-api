<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('units')->insert([
            [
                'name' => 'weight',
                'value' => 'g',
            ],
            [
                'name' => 'weight',
                'value' => 'kg',
            ]
        ]);
    }
}
