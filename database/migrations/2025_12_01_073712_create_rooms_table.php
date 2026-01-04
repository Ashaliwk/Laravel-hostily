<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('room_number')->unique();
            $table->string('type');            // Deluxe, Suite, Standard, etc.
            $table->decimal('price', 10, 2);
            $table->text('description')->nullable();
            $table->boolean('is_available')->default(true);
            $table->string('qr_code')->nullable();  // ← QR code filename
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rooms');
    }
};