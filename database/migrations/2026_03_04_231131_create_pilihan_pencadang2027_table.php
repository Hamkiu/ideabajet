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
        Schema::create('pilihan_pencadang2027', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_pencadang', 15);
            $table->tinyInteger('no_elemen');
            $table->string('nama_elemen', 255);
            $table->string('zon', 255);
            $table->text('lokasi_spesifik')->nullable();
            $table->text('cadangan')->nullable();
            $table->timestamps();

            $table->foreign('id_pencadang')->references('id')->on('maklumat_pencadang')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pilihan_pencadang2027');
    }
};
