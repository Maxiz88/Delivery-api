<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryUnitPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_unit', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('delivery_id');
            $table->unsignedBigInteger('unit_id');
            $table->boolean('unit_type')->default(0)->comment('0 - fixed, 1 - not fixed');
            $table->double('unit_value', 10, 2);
            $table->boolean('unit_from')->default(0)->comment('used for not fixed unit');
            $table->boolean('unit_to')->default(0)->comment('used for not fixed unit');
            $table->double('price', 10, 2)->comment('delivery price for 1 unit');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('delivery_id')->references('id')->on('deliveries');
            $table->foreign('unit_id')->references('id')->on('units');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('delivery_unit_pivot');
    }
}
