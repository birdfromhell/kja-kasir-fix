<?php

namespace App\Http\Controllers;

use App\Models\SubBukuBesar;
use App\Models\detail_pb;
use App\Models\detail_po;
use App\Models\faktur_beli;
use App\Models\pb_line;
use Carbon\Carbon;
use App\Models\PenerimaanBarang;
use App\Models\PurchaseOrder;
use App\Models\Barang;
use App\Models\Perusahaan;
use App\Models\BukuBesar;
use App\Models\StokOpnemBarang;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePenerimaanBarangRequest;
use App\Http\Requests\UpdatePenerimaanBarangRequest;
use App\Repository\PenerimaanBarang\PenerimaanBarangRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PenerimaanBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $penerimaaanbarangRepository;
    public function __construct(PenerimaanBarangRepository $penerimaaanbarangRepository)
    {
        $this->penerimaaanbarangRepository = $penerimaaanbarangRepository;
    }
    public function index()
    {
        $id = auth()->user()->id;
        try {
            return $this->penerimaaanbarangRepository->index($id);
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function laporan()
    {
        try {
            return $this->penerimaaanbarangRepository->laporan();
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
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

    public function print($id_po, $id_pb)
    {

        // $PO = PurchaseOrder::where('id_po', $id_po)->first();
        // $PB = PenerimaanBarang::where('id_pb', $id_pb)->first();
        // $perusahaan = $PB->nama_perusahaan;
        // $perusahaanData = Perusahaan::where('nama_perusahaan', $perusahaan)->first();
        // $detail = []; // Initialize $detail as an empty array
        // $barang = []; // Initialize $barang as an empty array
        // $supplier = $PO->nama_perusahaan;
        // $alamatsupplier = $perusahaan->alamat_gudang ?? null;

        try {
            return $this->penerimaaanbarangRepository->print($id_po, $id_pb);
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        // return view('barang.barangmasuk.PB.print', compact('PB', 'perusahaan', 'details', 'detaillagi', 'detail', 'PO', 'supplier', 'alamatsupplier', 'perusahaanData'));

    }

    public function PenerimaanBarang()
    {
        try {
            return $this->penerimaaanbarangRepository->PenerimaanBarang();
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function createPenerimaanBarang(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'ID_PO' => 'required',
                'tanggal_pb' => 'required|date',
                'surat_jalan' => 'required|string',
                'ket' => 'required|string',
                'result' => 'required', // Menambahkan validasi untuk data modal
            ]);

            $purchaseOrder = PurchaseOrder::where('id_po', $validatedData['ID_PO'])->first();
            $perusahaan = $purchaseOrder->kode_perusahaan;

            $selectedItems = json_decode($validatedData['result'], true); // Mengambil data hasil dari modal
            $id = auth()->user();
            $ids = $id->id;

            $lur = pb_line::create([
                'user_id' => $ids,
                'hariini' => $validatedData['tanggal_pb'],
            ]);

            if ($purchaseOrder) {
                $user = auth()->user()->name;

                PenerimaanBarang::create([
                    'id_pb' => $lur->id_pb,
                    'id_po' => $validatedData['ID_PO'],
                    'user' => $user,
                    'tanggal_pb' => $validatedData['tanggal_pb'],
                    'surat_jalan' => $validatedData['surat_jalan'],
                    'ket' => $validatedData['ket'],
                    'jatuh_tempo' => $purchaseOrder->jatuh_tempo,
                    'kode_perusahaan' => $purchaseOrder->kode_perusahaan,
                    'nama_perusahaan' => $purchaseOrder->nama_perusahaan,
                ]);
                foreach ($selectedItems as $item) {
                    detail_pb::create([
                        'id_po' => $purchaseOrder->id_po,
                        'id_pb' => $lur->id_pb,
                        'barang_id' => $item['kode_barang'],
                        'nama_barang' => $item['nama_barang'],
                        'stok' => $item['quantity'],
                        'harga' => $item['harga'],
                        'potongan' => $item['potongan'],
                        'diskon' => $item['diskon'],

                    ]);
                }
            } else {
                return response()->json(['error' => 'Purchase Order not found'], 404);
            }
            $latestPenerimaanBarang = PenerimaanBarang::latest()->first();
            PurchaseOrder::where('id_po', $validatedData['ID_PO'])->update(['id_pb' => $latestPenerimaanBarang->id_pb]);
            return response()->json([
                'success' => true,
                'message' => 'penerimaan barang berhasil dibuat',
                'data' => $lur->id_pb
            ]);
            return redirect()->route('penerimaanbarang.data')->with('success', 'PB berhasil ditambah');
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(PenerimaanBarang $penerimaanBarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required',
            'jumlah_barang' => 'required|numeric',
        ]);
        try {
            return $this->penerimaaanbarangRepository->edit($request, $id);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }




    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePenerimaanBarangRequest $request, PenerimaanBarang $penerimaanBarang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PenerimaanBarang $penerimaanBarang)
    {
        //
    }

    public function status(Request $request, $id)
    {
        // // Ambil semua entri stok berdasarkan id_pb
        // $listStok = detail_pb::where('id_pb', $id)->get();

        // // Loop melalui setiap entri stok
        // foreach ($listStok as $stok) {
        //     // Tambahkan stok ke setiap barang
        //     $barang = Barang::where('barang_id', $stok->barang_id)->first();

        //     if ($barang) {
        //         $barang->stok += $stok->stok;
        //         $barang->save();
        //     }
        // }
        try {
            $status = $request->get('status');
            $id = $request->get('id');
            return $this->penerimaaanbarangRepository->status($status, $id);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function faktur($id_pb)
    {
        try {
            return $this->penerimaaanbarangRepository->faktur($id_pb);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function iseng()
    {
        try {
            return $this->penerimaaanbarangRepository->iseng();
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
