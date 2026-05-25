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
        Schema::create('fuel_logs', function (Blueprint $table) {

            $table->id();

            $table->foreignId('vehicle_id')
                ->constrained()
                ->onDelete('cascade');

            $table->double('liter');

            $table->double('price');

            $table->date('date');

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
        Schema::dropIfExists('fuel_logs');
    }
};
