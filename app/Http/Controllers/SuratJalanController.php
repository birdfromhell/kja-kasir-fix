<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use App\Models\SuratJalan;
use App\Models\OrderPenjualan;
use App\Http\Requests\StoreSuratJalanRequest;
use App\Http\Requests\UpdateSuratJalanRequest;
use App\Models\Barang;
use App\Models\detail_op;
use App\Models\detail_sj;
use App\Models\faktur_jual;
use App\Models\sj_line;
use App\Models\BukuBesar;
use App\Models\SubBukuBesar;
use App\Repository\SuratJalan\SuratJalanRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Exception;

class SuratJalanController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $suratjalanRepository;
    public function __construct(SuratJalanRepository $suratjalanRepository)
    {
        $this->.suratjalanRepository = $suratjalanRepository;
    }
    public function index()
    {
        $id = auth()->user()->id;
        try {
            return $this->.suratjalanRepository->index($id);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function laporan()
    {
        $SuratJalan = SuratJalan::all();
        return view('barang.barangkeluar.suratjalan.dataSJ', compact('SuratJalan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function print($id_so, $id_sj)
    {
        try {
            return $this->.suratjalanRepository->print($id_so, $id_sj);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
    /**
     * Store a newly created resource in storage.
     */

    public function SuratJalan()
    {
        try {
            return $this->.suratjalanRepository->SuratJalan();
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
    public function store(StoreSuratJalanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SuratJalan $suratJalan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        try {
            $request->validate([
                'nama_barang' => 'required',
                'jumlah_barang' => 'required|numeric',
                // Pastikan jumlah_barang adalah angka
            ]);

            return $this->.suratjalanRepository->edit($request, $id);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
        // Validasi input

    }

    public function createSuratJalan(Request $request)
    {
        try {
            $validateData = $request->validate([
                'ID_SO' => 'required',
                'tanggal_sj' => 'required|date',
                'nopol' => 'required|string',
                'nama_supir' => 'required|string',
                'ket' => 'required|string',
            ]);

            $so = OrderPenjualan::where('id_so', $validateData['ID_SO'])->first();
            $perusahaan = $so->kode_perusahaan;

            $sj = $request->input('result');

            $selectedItem = json_decode($sj, true);
            $id = auth()->user();
            $user = auth()->user()->name;
            $ids = $id->id;

            $lur = sj_line::create([
                'user_id' => $ids,
                'hariini' => $validateData['tanggal_sj'],

            ]);

            SuratJalan::create([
                'id_sj' => $lur->id_sj,
                'id_so' => $validateData['ID_SO'],
                'user' => $user,
                'tanggal_sj' => $validateData['tanggal_sj'],
                'nopol' => $validateData['nopol'],
                'nama_supir' => $validateData['nama_supir'],
                'ket' => $validateData['ket'],
                'jatuh_tempo' => $so->jatuh_tempo, // Isi field jatuh_tempo dari purchase_order
                'kode_perusahaan' => $so->kode_perusahaan,
                'nama_perusahaan' => $so->nama_perusahaan,
            ]);

            if ($lur) {
                if (is_array($selectedItem)) {
                    //cuman karena ini kan ngirim kalo itu kan ngambil terus ngirim, berarti problemnya di ngambilnya
                    foreach ($selectedItem as $item) {
                        if (isset($item['id'])) {
                            $detail_so = detail_op::where('id', $item['id'])->where('id_so', $validateData['ID_SO'])->first();
                            if ($detail_so) {
                                $total = $item['quantity'] * $detail_so->harga * (1 - $detail_so->discount / 100);
                                detail_sj::create([
                                    'id_so' => $validateData['ID_SO'],
                                    'id_sj' => $lur->id_sj,
                                    'barang_id' => $detail_so->barang_id,
                                    'nama_barang' => $detail_so->nama_barang,
                                    'satuan' => $detail_so->satuan,
                                    'stok' => $item['quantity'],
                                    'harga' => $item['harga'],
                                    'potongan' => $item['potongan'],
                                    'diskon' => $item['diskon'],
                                    'harga_beli' => $detail_so->harga_beli,
                                ]);

                                $lastBalance = StokOpnemBarang::where('kode_barang', $detail_so->barang_id)
                                    ->orderBy('id', 'desc')
                                    ->firstOrNew();
                                $saldoTerakhir = ($lastBalance) ? $lastBalance->stok : 0;


                                // Update Barang table
                                Barang::where('barang_id', $detail_so->barang_id)->decrement('stok', $item['quantity']);

                                // Update kategori
                                $barang = Barang::where('barang_id', $detail_so->barang_id)->first();
                                $kategori = $barang->kategori;
                                Kategori::where('kode_kategori', $kategori)->decrement('stok', $item['quantity']);

                                $dok = 'SJ';
                                $ket = $perusahaan;

                                StokOpnemBarang::create([
                                    'kode_barang' => $detail_so->barang_id,
                                    'tanggal' => $validateData['tanggal_sj'],
                                    'no_bukti' => $lur->id_sj,
                                    'dok' => $dok,
                                    'ket' => $ket,
                                    'kredit' => $item['quantity'],
                                    'debet' => 0,
                                    'stok' => $saldoTerakhir - $item['quantity'],
                                    'harga' => $item['harga'], // Replace with the actual value for 'harga'
                                ]);
                            } else {
                                dd($detail_so);
                            }
                        } else {
                            dd($selectedItem);
                        }
                    }
                } else {
                    if (isset($selectedItem['id'])) {
                        $detail_so = detail_op::where('id', $selectedItem['id'])->where('id_so', $validateData['ID_SO'])->first();
                        if ($detail_so) {
                            $total = $selectedItem['quantity'] * $detail_so->harga * (1 - $detail_so->discount / 100);
                            detail_sj::create([
                                'id_so' => $validateData['ID_SO'],
                                'id_sj' => $lur->id_sj,
                                'barang_id' => $detail_so->barang_id,
                                'nama_barang' => $detail_so->nama_barang,
                                'satuan' => $detail_so->satuan,
                                'stok' => $selectedItem['quantity'],
                                'harga' => $selectedItem['harga'],
                                'potongan' => $selectedItem['potongan'],
                                'diskon' => $selectedItem['diskon'],
                                'harga_beli' => $detail_so->harga_beli,
                            ]);
                        } else {
                            dd($detail_so);
                        }
                    } else {
                        dd($selectedItem);
                    }
                }
            }
            $latestSuratJalan = SuratJalan::latest()->first();
            OrderPenjualan::where('id_so', $validateData['ID_SO'])->update(['id_sj' => $latestSuratJalan->id_sj]);

            return redirect('/dataSJ')->with('success', 'sj berhasil ditambah');
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSuratJalanRequest $request, SuratJalan $suratJalan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuratJalan $suratJalan)
    {
        //
    }

    public function status($status, $id)
    {
        try {
            return $this->.suratjalanRepository->status($status, $id);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function faktur($id_sj)
    {

        try {
            return $this->.suratjalanRepository->faktur($id_sj);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
