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
        Schema::create('jkkp6_mains', function (Blueprint $table) {
            $table->string('id', 15)->primary();
            $table->string('status')->default('BAHARU');
            $table->integer('status_nombor')->default(1);
            $table->string('peringkat')->default('DRAF');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jkkp6_mains');
    }
};
