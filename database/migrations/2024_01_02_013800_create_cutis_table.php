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
        Schema::create('cutis', function (Blueprint $table) {
            $table->id();
            $table->string('no_kontrak');
            $table->foreignId('kontrak_id')->constrained()->onDelete('cascade');
            $table->string('file_path')->nullable();
            $table->integer('jenisCuti');
            $table->timestamps();
        });

        Schema::create('tanggal_cutis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cuti_id')->constrained()->onDelete('cascade');
            $table->date('tanggal_cuti');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tanggal_cutis');
        Schema::dropIfExists('cutis');
    }
};
