<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    // Tambahkan baris ini agar data bisa diisi (mass assignment)
    protected $fillable = ['nama_sekolah', 'alamat'];

    // Relasi: Satu sekolah memiliki banyak user (siswa/guru)
    public function users()
    {
        return $this->hasMany(User::class);
    }
    
    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}