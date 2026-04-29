<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
    'user_id', 'school_id', 'nama_pelaku', 'kelas_pelaku', 
    'tanggal_kejadian', 'lokasi_kejadian', 'jenis_bullying', 
    'deskripsi', 'bukti', 'status', 'is_anonymous'
];

public function user()
{
    return $this->belongsTo(User::class, 'user_id')->withDefault([
        'name' => 'User Terhapus'
    ]);
}

public function school()
{
    return $this->belongsTo(School::class, 'school_id');
}
}
