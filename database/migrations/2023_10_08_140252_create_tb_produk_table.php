<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

        public function up() 
        {
            Schema::create('tb_produk', function (Blueprint $table) {
                $table->id(); //idProduk
                $table->text('gambar');
                $table->string('judulProduk', 120);
                $table->bigInteger('harga');
                $table->string('deskripsi', 250);
                $table->string('alamatToko', 100);
                $table->timestamps();
            });
        }

    /**
     * Reverse the migrations.
     */
    public function down() 
    {
        Schema::dropIfExists('tb_produk');
    }
};
