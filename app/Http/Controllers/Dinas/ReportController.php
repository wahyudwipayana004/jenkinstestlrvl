<?php
namespace App\Http\Controllers\Dinas;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\School;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function index() {
        $schools = School::withCount('reports')->get();
        $totalReports = Report::count();
        return view('dinas.dashboard', compact('schools', 'totalReports'));
    }

    public function showReport($id)
    {
        // Mencari laporan berdasarkan ID beserta data user dan sekolahnya
        $report = Report::with(['user', 'school'])->findOrFail($id);

        // Mengarahkan ke file view yang sudah kita buat sebelumnya
        return view('dinas.report_show', compact('report'));
    }
    public function schoolReports($school_id)
    {
    $school = \App\Models\School::findOrFail($school_id);
    // Mengambil semua laporan khusus sekolah ini
    $reports = \App\Models\Report::where('school_id', $school_id)->latest()->get();

    return view('dinas.school_reports', compact('school', 'reports'));
    }

    public function exportSekolahPDF($id)
    {
    $school = School::findOrFail($id);
    // Ambil semua laporan milik sekolah ini
    $reports = Report::where('school_id', $id)->with('user')->get();

    $pdf = Pdf::loadView('dinas.rekap_sekolah_pdf', compact('school', 'reports'))
              ->setPaper('a4', 'landscape'); // Gunakan landscape agar tabel muat banyak kolom

    return $pdf->download('Rekap_Laporan_' . str_replace(' ', '_', $school->nama_sekolah) . '.pdf');
    }


}

