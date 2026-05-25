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
        Schema::create('approvals', function (Blueprint $table) {

            $table->id();

            $table->foreignId('booking_id')
                ->constrained()
                ->onDelete('cascade');

            $table->foreignId('approver_id')
                ->constrained('users')
                ->onDelete('cascade');

            $table->integer('level');

            $table->enum('status', [
                'pending',
                'approved',
                'rejected',
                'waiting'
            ])->default('waiting');

            $table->timestamp('approved_at')
                ->nullable();

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
        Schema::dropIfExists('approvals');
    }
};
