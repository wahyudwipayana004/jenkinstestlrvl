<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\School;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Menggunakan firstOrCreate agar sekolah tidak duplikat jika seeder dijalankan ulang
        $sekolah1 = School::firstOrCreate(
            ['nama_sekolah' => 'SMA N 1 MENGWI'],
            ['alamat' => 'Jl. Merdeka No. 1']
        );
        $sekolah2 = School::firstOrCreate(
            ['nama_sekolah' => 'SMAN 2 MENGWI'],
            ['alamat' => 'Jl. Asia Afrika No. 10']
        );
        $sekolah3 = School::firstOrCreate(
            ['nama_sekolah' => 'SMA 1 KUTA UTARA'],
            ['alamat' => 'Jl. Pemuda No. 5']
        );
        $sekolah4 = School::firstOrCreate(
            ['nama_sekolah' => 'SMA 2 KUTA UTARA'],
            ['alamat' => 'Jl. Pemuda No. 5']
        );
        $sekolah5 = School::firstOrCreate(
            ['nama_sekolah' => 'SMA 1 ABIANSEMAL'],
            ['alamat' => 'Jl. Pemuda No. 5']
        );
        $sekolah6 = School::firstOrCreate(
            ['nama_sekolah' => 'SMK N 3 TABANAN'],
            ['alamat' => 'Bunut Puun Nengkelod']
        );




        // 2. Menggunakan updateOrCreate untuk User
        // Jika email ditemukan, data akan di-update. Jika tidak ada, baru dibuatkan.
  // GURU BK //      
        User::updateOrCreate(
            ['email' => 'guru@sma1mengwi.com'],
            [
                'name' => 'GURU BK SMA NEGERI 1 MENGWI',
                'password' => bcrypt('password123'),
                'role' => 'guru_bk',
                'school_id' => $sekolah1->id
            ]
        );

        User::updateOrCreate(
            ['email' => 'guru@sma2mengwi.com'],
            [
                'name' => 'GURU BK SMA NEGERI 2 MENGWI',
                'password' => bcrypt('password123'),
                'role' => 'guru_bk',
                'school_id' => $sekolah2->id
            ]
        );

        User::updateOrCreate(
            ['email' => 'guru@sma1kutautara.com'],
            [
                'name' => 'GURU BK SMA NEGERI 1 KUTA UTARA',
                'password' => bcrypt('password123'),
                'role' => 'guru_bk',
                'school_id' => $sekolah3->id
            ]
        );

        User::updateOrCreate(
            ['email' => 'guru@sma2kutautara.com'],
            [
                'name' => 'GURU BK SMA NEGERI 2 KUTA UTARA',
                'password' => bcrypt('password123'),
                'role' => 'guru_bk',
                'school_id' => $sekolah4->id
            ]
        );

        User::updateOrCreate(
            ['email' => 'guru@sma1abiansemal.com'],
            [
                'name' => 'GURU BK SMAN 1 ABIANSEMAL',
                'password' => bcrypt('password123'),
                'role' => 'guru_bk',
                'school_id' => $sekolah5->id
            ]
        );

        User::updateOrCreate(
            ['email' => 'guru@smk3tabanan.com'],
            [
                'name' => 'GURU BK SMKN 3 TABANAN',
                'password' => bcrypt('password123'),
                'role' => 'guru_bk',
                'school_id' => $sekolah6->id
            ]
        );
        
        
// ADMIN DINAS //
        User::updateOrCreate(
            ['email' => 'admin@dinas.com'],
            [
                'name' => 'Admin Dinas Pendidikan',
                'password' => bcrypt('password123'),
                'role' => 'admin_dinas'
            ]
        );
        
    }
}