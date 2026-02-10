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
        Schema::create('jkkp6_maklumat', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_jkkp6', 15);
            $table->string('nama_pem');
            $table->string('jaw_pem');
            $table->string('jab_pem');
            $table->string('tel_pem');
            $table->string('id_pem');

            $table->string('nama_boss');

            $table->string('id_terlibat');
            $table->string('nama_terlibat');
            $table->string('kp_terlibat');
            $table->date('tarikh_lahir');
            $table->string('warganegara');
            $table->string('jantina');
            $table->string('jawatan');
            $table->string('jabatan');
            $table->decimal('gaji', 10, 2);

            $table->date('tarikh_kejadian');
            $table->time('masa_kejadian');
            $table->string('lokasi_kejadian');
            $table->string('huraian_sebelum');
            $table->string('huraian_semasa');
            $table->string('huraian_selepas');
            $table->timestamps();

            $table->foreign('id_jkkp6')->references('id')->on('jkkp6_mains')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jkkp6_maklumat');
    }
};
