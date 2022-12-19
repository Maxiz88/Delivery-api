<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeliveryUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('delivery_unit')->insert([
            [
                'delivery_id' => 1,
                'unit_id' => 2,
                'unit_type' => 1,
                'unit_value' => 4.5,
                'unit_from' => 0,
                'unit_to' => 1,
                'price' => 2.00,
            ],
            [
                'delivery_id' => 1,
                'unit_id' => 2,
                'unit_type' => 1,
                'unit_value' => 4.6,
                'unit_from' => 1,
                'unit_to' => 0,
                'price' => 3.00,
            ],
            [
                'delivery_id' => 2,
                'unit_id' => 1,
                'unit_type' => 0,
                'unit_value' => 100,
                'unit_from' => 0,
                'unit_to' => 0,
                'price' => 0.33,
            ],
        ]);
    }
}
