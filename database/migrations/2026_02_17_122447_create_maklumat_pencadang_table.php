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
        Schema::create('maklumat_pencadang', function (Blueprint $table) {
            $table->string('id', 15)->primary();
            $table->string('nama');
            $table->string('email');
            $table->string('jantina');
            $table->string('bangsa');
            $table->string('umur');
            $table->string('pekerjaan');
            $table->string('zon')->nullable();
            $table->string('cadangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maklumat_pencadang');
    }
};
