<?php

namespace App\Http\Controllers;

use App\Models\LaporanSampah;
use Illuminate\Http\Request;

class LaporanSampahController extends Controller
{
    public function index()
    {
        $laporans = LaporanSampah::with('user')->paginate(10);
        return view('laporan_sampah.index', compact('laporans'));
    }

    public function create()
    {
        return view('laporan_sampah.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'jenis_sampah' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'foto' => 'nullable|image|max:2048',
        ]);

        $data = $validated;
        $data['user_id'] = auth()->id();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('laporan_foto', 'public');
        }

        LaporanSampah::create($data);

        return redirect()->route('laporan_sampah.index')->with('success', 'Laporan berhasil dibuat.');
    }

    public function show(LaporanSampah $laporanSampah)
    {
        return view('laporan_sampah.show', compact('laporanSampah'));
    }

    public function edit(LaporanSampah $laporanSampah)
    {
        return view('laporan_sampah.edit', compact('laporanSampah'));
    }

    public function update(Request $request, LaporanSampah $laporanSampah)
    {
        $validated = $request->validate([
            'jenis_sampah' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'status' => 'required|in:dikirim,diproses,selesai',
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('laporan_foto', 'public');
        }

        $laporanSampah->update($validated);

        return redirect()->route('laporan_sampah.index')->with('success', 'Laporan berhasil diperbarui.');
    }

    public function destroy(LaporanSampah $laporanSampah)
    {
        $laporanSampah->delete();
        return redirect()->route('laporan_sampah.index')->with('success', 'Laporan berhasil dihapus.');
    }
}
