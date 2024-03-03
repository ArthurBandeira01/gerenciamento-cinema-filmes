<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sessions_rooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('roomId');
            $table->foreign('roomId')->references('id')->on('rooms');
            $table->string('movie');
            $table->string('movieImage');
            $table->integer('numberSeats');
            $table->decimal('priceTicket', 10, 2);
            $table->date('sessionDate');
            $table->time('sessionTime');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions_rooms');
    }
};
