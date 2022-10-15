<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->string('ship_name')->nullable();
            $table->string('ship_phone')->nullable();
            $table->string('ship_email')->nullable();
            $table->string('ship_address')->nullable();
            $table->string('ship_city')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shipping');
    }
};
