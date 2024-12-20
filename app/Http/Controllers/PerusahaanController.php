<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perusahaan;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePerusahaanRequest;
use App\Http\Requests\UpdatePerusahaanRequest;
use App\Repository\Perusahaan\PerusahaanRepository;

class PerusahaanController extends Controller
{
    protected $perusahaanRepository;

    public function __construct(PerusahaanRepository $perusahaanRepository)
    {
        $this->perusahaanRepository = $perusahaanRepository;
    }

    public function index()
    {
        try {
           return $this->perusahaanRepository->index();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function create()
    {
        return view('relasi.edit');
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nama_perusahaan' => 'required',
                'jenis' => 'required',
                'alamat_kantor' => 'required',
                'alamat_gudang' => 'required',
                'nama_pimpinan' => 'required',
                'no_telepon' => 'required',
                'plafon_debit' => $request->jenis == 'Supplier' ? 'required|numeric' : 'nullable',
                'plafon_kredit' => $request->jenis == 'Konsumen' ? 'required|numeric' : 'nullable',
            ]);

            // Simpan data perusahaan
            Perusahaan::create($validatedData);

            // Redirect dengan pesan sukses
            return redirect('/app/relasi')->with('success', 'Perusahaan berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function edit($id)
    {
        try {
            // $data = $this->perusahaanRepository->edit($id);
            return $this->perusahaanRepository->edit($id);
            // return view('relasi.edit', compact('data'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'alamat_kantor' => 'required|string',
            'alamat_gudang' => 'required|string',
            'nama_pimpinan' => 'required|string|max:255',
            'no_telepon' => 'required|string',
            'plafon_debit' => 'nullable|numeric',
            'plafon_kredit' => 'nullable|numeric',
        ]);

        $perusahaan = Perusahaan::findOrFail($id);
        $perusahaan->update($validated);

        return response()->json(['message' => 'Perusahaan berhasil diperbarui!']);

}


public function destroy($id)
{
    try {
        $perusahaan = Perusahaan::findOrFail($id); // Ini akan memicu error jika tidak ditemukan
        $perusahaan->delete();
        return redirect('/app/relasi')->with('success', 'Perusahaan berhasil dihapus.');
    } catch (\Exception $e) {
        return redirect('/app/relasi')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}


    public function profile()
    {
        return view('account.profile');
    }

    public function profileedit()
    {
        return view('relasi.edit-profile');
    }
}
