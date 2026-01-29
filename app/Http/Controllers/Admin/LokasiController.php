<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lokasi;

class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = Lokasi::where('aktif', 'Y')->get();
        return view('admin.location.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $payload = $request->validate([
            'nama_lokasi' => 'required|string|max:255',
        ]);

        if (!isset($payload['nama_lokasi'])) {
            return redirect()->route('admin.location.index')->with('error', 'Lokasi wajib diisi.');
        }

        Lokasi::create([
            'nama_lokasi' => $payload['nama_lokasi'],
        ]);

        return redirect()->route('admin.location.index')->with('success', 'Lokasi berhasil ditambahkan.');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $payload = $request->validate([
            'nama_lokasi' => 'required|string|max:255',
            'aktif' => 'string|max:255'
        ]);

        if (!isset($payload['nama_lokasi'])) {
            return redirect()->route('admin.location.index')->with('error', 'Lokasi wajib diisi.');
        }

        $location = Lokasi::findOrFail($id);
        $location->nama_lokasi = $payload['nama_lokasi'];
        $location->aktif = $payload['aktif'];
        $location->save();

        return redirect()->route('admin.location.index')->with('success', 'Lokasi berhasil diperbarui.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Lokasi::destroy($id);
        $location = Lokasi::findOrFail($id);
        $location->aktif = 'N';
        $location->save();
        return redirect()->route('admin.location.index')->with('success', 'Lokasi berhasil dihapus.');
    }
}
