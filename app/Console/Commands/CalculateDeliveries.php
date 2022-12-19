<?php

namespace App\Console\Commands;

use App\Contracts\Calculator;
use Illuminate\Console\Command;

class CalculateDeliveries extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deliveries:calculate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(Calculator $calculator)
    {
        $this->table(
            ['Package_id', 'Sender name', 'recipient_name', 'company_name', 'Weight, kg', 'Delivery price, EUR'],
            $calculator->calculate()
        );
    }
}
