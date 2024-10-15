<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Kelompok;
use App\Repository\Barang\BarangRepository;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    protected $barangRepository;

    public function __construct(BarangRepository $barangRepository)
    {
        $this->barangRepository = $barangRepository;
    }

    public function index()
    {
        $userId = auth()->user()->id; // Assuming you want to pass the authenticated user's ID
        return $this->barangRepository->index($userId);
    }

    public function create()
    {
        $kelompok = Kelompok::all();
        return view('barang.create', compact('kelompok'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_barang' => 'required|string',
            'satuan' => 'required|string',
            'kategori' => 'required|string',
            'kelompok' => 'required|string',
            'harga_beli' => 'required|numeric',
            'perusahaan' => 'required|string', // Tambahkan ini jika perlu
        ]);

        try {
            return $this->barangRepository->store($validatedData);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $barang = Barang::with(['kategori', 'kelompok'])->find($id);
        if (!$barang) {
            return redirect()->back()->with('error', 'Barang tidak ditemukan.');
        }

        $kelompok = Kelompok::all();
        $kategori = Kategori::all();

        return view('barang.edit', compact('barang', 'kelompok', 'kategori'));
    }



    public function update($id, Request $request)
{
    $validatedData = $request->validate([
        'nama_barang' => 'required|string',
        'satuan' => 'required|string',
        'kategori_id' => 'required|integer',
        'kelompok_id' => 'required|integer',
        'harga_beli' => 'required|numeric',
    ]);

    try {
        // Panggil metode update dari repository
        $this->barangRepository->update($id, $validatedData);

        // Redirect ke halaman barang dengan pesan sukses
        return redirect()->route('barang.index')->with('success', 'Barang berhasil diperbarui!');
    } catch (\Exception $e) {
        \Log::error('Update failed: ' . $e->getMessage()); // Log error
        return redirect()->back()->with('error', 'Gagal memperbarui barang: ' . $e->getMessage());
    }
}




    public function destroy($id)
    {
        try {
            $data = Barang::findOrFail($id);
            $barang = $data->nama_barang;
            $data->delete();
            return response()->json(['success' => 'Barang <strong>' . $barang . '</strong> telah dihapus.']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function print()
    {
        try {
            return $this->barangRepository->print();
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function sobarangmanual()
    {
        try {
            return $this->barangRepository->sobarangmanual();
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function sobarangupdate(Request $request)
    {
        $validatedData = $request->validate([
            'barang_id' => 'required|string',
            'sistem' => 'required|string',
            'phisik' => 'required|integer',
            'ket' => 'required|string',
        ]);

        try {
            return $this->barangRepository->sobarangupdate($validatedData);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
