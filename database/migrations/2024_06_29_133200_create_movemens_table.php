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
        Schema::create('movements', function (Blueprint $table) {
            $table->id();
            $table->double('quantity');
            $table->string('comment', 255)->nullable();
            $table->unsignedBigInteger('movement_type_id');
            $table->unsignedBigInteger('part_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('movement_type_id')->references('id')->on('movement_types');
            $table->foreign('part_id')->references('id')->on('parts');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movemens');
    }
};
