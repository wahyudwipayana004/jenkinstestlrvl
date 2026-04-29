<?php
namespace App\Http\Controllers\Guru;
use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    //berfungsi untuk menampilkan laporan siswa dari sekolah/school_id siswa tersebut secara ID laporan, nama pelapor, kategori bullying, di dashboard guru
    public function index() {
        $reports = Report::where('school_id', Auth::user()->school_id)->latest()->get();
        return view('guru.dashboard', compact('reports'));
    }

    //berfungsi untuk menampilkan detail laporan siswa tersebut di guru/show.blade.php
    public function show($id) {
        $report = Report::where('school_id', Auth::user()->school_id)->findOrFail($id);
        return view('guru.show', compact('report'));
    }

    //berfungsi untuk mengupdate status laporan dari siswa tersebut 
    public function updateStatus(Request $request, $id) {
        $report = Report::where('school_id', Auth::user()->school_id)->findOrFail($id);
        $report->update([
        'status' => $request->status, //update status
        'tanggapan' => $request->tanggapan]); //tidak berfungsi
        return back()->with('success', 'Status laporan diperbarui.');
    }

    //berfungsi untuk mengekspor laporan menjadi pdf
    public function exportPDF($id)
    {
    $report = \App\Models\Report::with(['user', 'school'])->findOrFail($id);

    // Load view khusus untuk PDF
    $pdf = Pdf::loadView('guru.report_pdf', compact('report'));

    // Download file PDF
    return $pdf->download('Laporan_Bullying_'.$report->id.'.pdf');
    }
}