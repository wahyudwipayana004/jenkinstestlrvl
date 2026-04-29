<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Siswa\ReportController as SiswaReport;
use App\Http\Controllers\Guru\ReportController as GuruReport;
use App\Http\Controllers\Dinas\ReportController as DinasReport;
use App\Http\Controllers\Dinas\ReportController as ShowReport;
use App\Http\Controllers\Dinas\ReportController as DinasPdf;
use App\Http\Controllers\SchoolController;


Route::get('/', function () {
    return redirect()->route('login');
});

// Dashboard Logic
Route::get('/dashboard', function (Request $request) {
    $user = $request->user();

    
    if ($user->role == 'siswa') {
        return view('siswa.dashboard');
    } 
    
    if ($user->role == 'guru_bk') {
        return view('guru.dashboard');
    } 
    
    if ($user->role == 'admin_dinas') {
        return view('dinas.dashboard');
    }

    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Grouping Route berdasarkan Auth
Route::middleware('auth')->group(function () {
    
    // --- FITUR PROFILE ---
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // --- FITUR SISWA  ---
    Route::middleware(['auth', 'role:siswa'])->prefix('siswa')->name('siswa.')->group(function () {
    Route::get('/report/create', [SiswaReport::class, 'create'])->name('report.create');
    Route::post('/report/store', [SiswaReport::class, 'store'])->name('report.store');
    Route::get('/report', [SiswaReport::class, 'index'])->name('report.index');
    Route::get('/report/{id}', [SiswaReport::class, 'show'])->name('report.show');
});

    // --- FITUR GURU BK  ---
    Route::get('/guru/report/{id}', [GuruReport::class, 'show'])->name('guru.report.show');
    Route::patch('/guru/report/{id}/status', [GuruReport::class, 'updateStatus'])->name('guru.report.updateStatus');
    Route::get('/guru/report/{id}/export', [GuruReport::class, 'exportPDF'])->name('guru.report.export');
    
    // --- FITUR DINAS  ---
    Route::get('/dinas/monitoring', [DinasReport::class, 'index'])->name('dinas.monitoring');
    Route::get('/dinas/sekolah/{school_id}', [DinasReport::class, 'schoolReports'])->name('dinas.monitoring.school');
    Route::get('/dinas/report/{id}', [ShowReport::class, 'showReport'])->name('dinas.report.show');
    Route::get('/dinas/sekolah/{id}/export', [DinasPdf::class, 'exportSekolahPDF'])
     ->name('dinas.sekolah.export');
    Route::resource('/dinas/schools', SchoolController::class)->names([
        'index' => 'dinas.schools.index',
        'create' => 'dinas.schools.create',
        'store' => 'dinas.schools.store',
        'show' => 'dinas.schools.show',
        'edit' => 'dinas.schools.edit',
        'update' => 'dinas.schools.update',
        'destroy' => 'dinas.schools.destroy',
    ]);
});

require __DIR__.'/auth.php';