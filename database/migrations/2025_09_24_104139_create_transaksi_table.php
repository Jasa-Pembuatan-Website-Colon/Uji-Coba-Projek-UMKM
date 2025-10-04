<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transaksi', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade'); // relasi ke users
    $table->date('tanggal');
    $table->string('keterangan');
    $table->enum('jenis', ['masuk', 'keluar']);
    $table->bigInteger('jumlah');
    $table->timestamps();
});
    }

    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
