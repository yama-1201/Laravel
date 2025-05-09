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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name','10');
            $table->string('email','30');
            $table->string('image','100')->nullable();
            $table->string('password','255');
            $table->string('remember_token','255')->nullable();
            $table->tinyInteger('del_flg')->default(0);
            $table->tinyInteger('role');
            $table->text('profile')->nullable();;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
