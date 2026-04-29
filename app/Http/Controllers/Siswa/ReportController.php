<?php
namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function create() {
        return view('siswa.report_create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama_pelaku' => 'nullable|string|max:255',
            'tanggal_kejadian' => 'required|date',
            'lokasi_kejadian' => 'required|string',
            'jenis_bullying' => 'required',
            'deskripsi' => 'required',
            'bukti' => 'nullable|image|max:2048',
        ]);

        $buktiPath = $request->hasFile('bukti') ? $request->file('bukti')->store('bukti_bullying', 'public') : null;

        Report::create([
            'user_id' => Auth::id(),
            'school_id' => Auth::user()->school_id,
            'nama_pelaku' => $request->nama_pelaku,
            'tanggal_kejadian' => $request->tanggal_kejadian,
            'lokasi_kejadian' => $request->lokasi_kejadian,
            'jenis_bullying' => $request->jenis_bullying,
            'deskripsi' => $request->deskripsi,
            'bukti' => $buktiPath,
            'is_anonymous' => $request->has('is_anonymous'),
            'status' => 'menunggu'
        ]);

        return redirect()->route('dashboard')->with('success', 'Laporan berhasil terkirim!');
    }
    public function index()
{
    // Pastikan user sedang login
    if (!Auth::check()) {
        return redirect()->route('login');
    }

    // Gunakan Auth::id() yang lebih stabil
    $reports = Report::where('user_id', Auth::id())->latest()->get();
    
    return view('siswa.report_index', compact('reports'));
}
    public function show($id)
{
    // Cari laporan milik siswa ini, jika tidak ada atau bukan miliknya akan 404
    $report = Report::where('user_id', Auth::id())->findOrFail($id);

    return view('siswa.report_show', compact('report'));
}
}