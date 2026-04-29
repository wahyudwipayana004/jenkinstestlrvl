<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function index()
    {
        $schools = School::withCount('reports')->get();
        return view('dinas.schools.index', compact('schools'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_sekolah' => 'required|string|max:255',
            'alamat' => 'required|string',
        ]);

        School::create($request->all());
        return redirect()->back()->with('success', 'Sekolah berhasil ditambahkan.');
    }

    public function update(Request $request, School $school)
    {
        $request->validate([
            'nama_sekolah' => 'required|string|max:255',
            'alamat' => 'required|string',
        ]);

        $school->update($request->all());
        return redirect()->back()->with('success', 'Data sekolah diperbarui.');
    }

    public function destroy(School $school)
    {
        // Cek jika sekolah masih memiliki laporan atau user
        if($school->reports()->count() > 0) {
            return redirect()->back()->with('error', 'Tidak bisa menghapus sekolah yang memiliki data laporan.');
        }
        
        $school->delete();
        return redirect()->back()->with('success', 'Sekolah berhasil dihapus.');
    }
}
