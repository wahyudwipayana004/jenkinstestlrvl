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
    Schema::create('reports', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Pelapor (Siswa)
        $table->foreignId('school_id')->constrained(); // Sekolah terkait
        $table->string('nama_pelaku')->nullable(); // Opsional
        $table->string('kelas_pelaku')->nullable();
        $table->date('tanggal_kejadian');
        $table->string('lokasi_kejadian');
        $table->enum('jenis_bullying', ['Fisik', 'Verbal', 'Sosial', 'Cyber','Seksual']);
        $table->text('deskripsi');
        $table->string('bukti')->nullable(); // Untuk simpan nama file foto/video
        $table->string('status')->default('Menunggu');
        $table->boolean('is_anonymous')->default(false);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
