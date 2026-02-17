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
        Schema::create('pilihan_pencadang', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_pencadang', 15);
            $table->tinyInteger('no_elemen');
            $table->string('pilihan', 255);
            $table->string('lokasi', 255)->nullable();
            $table->string('aset', 255)->nullable();
            $table->text('butiran')->nullable();
            $table->timestamps();

            $table->foreign('id_pencadang')->references('id')->on('maklumat_pencadang')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pilihan_pencadang');
    }
};
