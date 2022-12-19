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
        $this->call([
           CurrencySeeder::class,
           UnitSeeder::class,
           DeliverySeeder::class,
           DeliveryUnitSeeder::class,
           PackageSeeder::class
        ]);
    }
}
