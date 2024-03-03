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
        Schema::create('sessions_clients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sessionRoomId');
            $table->foreign('sessionRoomId')->references('id')->on('sessions_rooms');
            $table->integer('cpf', 11);
            $table->integer('numberSeat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions_clients');
    }
};
