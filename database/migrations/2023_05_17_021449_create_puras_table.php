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
        Schema::create('puras', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('alamat');
            $table->enum('jenis',['Swagina','Kawitan','Kahyangan Tiga','Kahyangan Jagat']);
            $table->enum('jenis_piodalan',['Wuku','Sasih']);
            $table->enum('wuku',['Sinta','Landep','Ukir','Kulantir','Tolu','Gumbreg','Wariga','Warigadian','Julungwangi','Sungsang',
                                 'Dungulan','Kuningan','Langkir','Medangsia','Pujut','Pahang','Krulut','Mrakih','Tambir','Madangkungan',
                                 'Matal','Uye','Mnail','Prangbakat','Bala','Ugu','Wayang','Klawu','Dukut','Watugunung'])->nullable();
            $table->enum('sapta_wara',['Redite','Soma','Anggara','Budha','Wrhaspati','Sukra','Saniscara'])->nullable();
            $table->enum('panca_wara',['Umanis','Paing','Pon','Wage','Kliwon'])->nullable();
            $table->enum('sasih',['Kasa','Karo','Katiga','Kapat','Kalima','Kanam','Kapitu','Kawolu','Kasanga','Kadasa','Jiyestha','Sadha'])->nullable();
            $table->double('lat');
            $table->double('lng');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('puras');
    }
};
