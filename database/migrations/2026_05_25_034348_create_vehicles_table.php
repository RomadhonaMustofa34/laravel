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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();

            $table->foreignId('location_id')
                ->nullable()
                ->constrained()
                ->onDelete('cascade');

            $table->string('plate_number')->unique();
            $table->string('name');

            $table->enum('vehicle_type', [
                'orang',
                'barang'
            ]);

            $table->enum('ownership', [
                'milik',
                'sewa'
            ]);

            $table->string('brand')->nullable();

            $table->year('year')->nullable();

            $table->double('fuel_consumption')
                ->nullable();

            $table->date('service_schedule')
                ->nullable();

            $table->enum('status', [
                'available',
                'used',
                'service'
            ])->default('available');

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
        Schema::dropIfExists('vehicles');
    }
};
