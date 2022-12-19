<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeliverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('deliveries')->insert([
            [
                'currency_id' => 2,
                'company_name' => 'USP',
                'description' => 'Operating in more than 220 countries and territories, USP is committed to moving our
                world forward by delivering what matters. Beginning as a small messenger service started by enterprising
                teenagers and a $100 loan, USP and its more than 500,000 USPers around the globe are a transportation
                and logistics leader, offering innovative solutions to customers, big and small. USP understands and
                appreciates its responsibility to help build safer, stronger and more resilient communities founded
                on justice and economic opportunity for all, supported by a healthy, sustainable global environment.',
            ],
            [
                'currency_id' => 1,
                'company_name' => 'DHL',
                'description' => 'DHL is an international company for express delivery
                of goods and documents, the leader of the global and Russian logistics markets. The company was founded
                in San Francisco in 1969 to transport documents between San Francisco and Honolulu , but DHL soon
                expanded its network worldwide. It is currently part of the Deutsche Post DHL Group of Companies, being
                the de facto national postal operator of Germany. The company headquarters is located in Bonn (Germany)',
            ],
        ]);
    }
}
