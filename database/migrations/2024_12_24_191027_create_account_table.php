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
        Schema::create('account', function (Blueprint $table) {
            $table->id();
            $table->string('firstname')->default('null');
            $table->string('lastname')->default('null');
            $table->string('displayname')->default('null');
            $table->string('email')->default('null');
            $table->string('currentpwd')->default('null');
            $table->string('newpwd')->default('null');
            $table->string('confirmpwd')->default('null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account');
    }
};
