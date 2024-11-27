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
        Schema::create('food_ingridients', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk');
            $table->integer('stok_awal');
            $table->integer('masuk');
            $table->integer('keluar');
            $table->integer('stok_akhir');
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_ingridients');
    }
};
