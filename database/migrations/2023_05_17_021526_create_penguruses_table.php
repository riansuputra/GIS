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
        Schema::create('penguruses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pura_id')->constrained('puras');
            $table->string('nama');
            $table->enum('sebagai',['Pemangku','Ketua','Sekretaris','Bendahara']);
            $table->string('alamat');
            $table->string('telepon');
            $table->year('tahun_mulai');
            $table->year('tahun_berakhir');
            $table->enum('status',['Aktif','Tidak Aktif']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penguruses');
    }
};
