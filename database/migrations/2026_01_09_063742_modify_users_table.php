<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up() {
    Schema::table('users', function (Blueprint $table) {
        $table->enum('role', ['siswa', 'guru_bk', 'admin_dinas'])->default('siswa');
        $table->foreignId('school_id')->nullable()->constrained('schools');
        $table->string('nisn')->nullable()->unique();
        $table->enum('jenis_kelamin', ['L', 'P'])->nullable();
        $table->string('kelas')->nullable();
        $table->text('alamat')->nullable();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
