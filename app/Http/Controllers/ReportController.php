<?php
namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function create()
    {
        return view('reports.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pelaku' => 'nullable|string|max:255',
            'tanggal_kejadian' => 'required|date',
            'lokasi_kejadian' => 'required|string',
            'jenis_bullying' => 'required',
            'deskripsi' => 'required',
            'bukti' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $buktiPath = null;
        if ($request->hasFile('bukti')) {
            $buktiPath = $request->file('bukti')->store('bukti_bullying', 'public');
        }

        Report::create([
            'user_id' => Auth::id(),
            'school_id' => Auth::user()->school_id,
            'nama_pelaku' => $request->nama_pelaku,
            'kelas_pelaku' => $request->kelas_pelaku,
            'tanggal_kejadian' => $request->tanggal_kejadian,
            'lokasi_kejadian' => $request->lokasi_kejadian,
            'jenis_bullying' => $request->jenis_bullying,
            'deskripsi' => $request->deskripsi,
            'bukti' => $buktiPath,
            'is_anonymous' => $request->has('is_anonymous'),
            'status' => 'Menunggu',
        ]);

        return redirect()->route('dashboard')->with('success', 'Laporan berhasil dikirim!');
    }
}