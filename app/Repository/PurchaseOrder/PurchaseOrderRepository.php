<?php

namespace App\Repository\PurchaseOrder;

use App\Models\Barang;
use App\Models\detail_po;
use App\Models\Perusahaan;
use App\Models\po_line;
use App\Models\PurchaseOrder;
use App\Models\Termin;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseOrderRepository
{
    public function index($id)
    {
        if ($id === null) {
            return redirect('/app/purchaseorder/data')->with('error', 'Terjadi Kesalahan');
        }
        try {
            $purchaseOrders = PurchaseOrder::paginate(20);
            $perusahaan = Perusahaan::all();
            $detailTotal = 0;
            $detailBarang = 0;
            $detail = [];

            foreach ($purchaseOrders as $purchaseOrder) {
                $details = detail_po::where('id_po', $purchaseOrder->id_po)->first();
                if ($details) {
                    $detaillagi = detail_po::where('id_po', $purchaseOrder->id_po)->get();
                    $detail[] = $detaillagi;
                }
            }

            return view('barang.barangmasuk.po.view-data', compact('purchaseOrders', 'detailTotal', 'detailBarang', 'detail', 'perusahaan'));
        } catch (Exception $e) {
            return redirect('/app/purchaseorder/data')->with('error', 'Error retrieving purchase orders.');
        }
    }

    public function updateStatus($id, array $data)
    {
        try {
            $status = $data['status'] ?? null; // Ambil status dari data input
            if (in_array($status, ['Approve', 'Decline'])) {
                PurchaseOrder::where('id_po', $id)->update(['status' => $status]);
                return [
                    'status' => 'success',
                    'message' => 'Successfully updated status to ' . $status
                ];
            } else {
                return [
                    'status' => 'error',
                    'message' => 'Invalid status: ' . $status
                ];
            }
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to update status: ' . $e->getMessage()
            ], 500);
        }
    }

    public function print($id)
    {
        try {
            $user = Auth::user();
            $purchaseOrders = PurchaseOrder::where('id_po', $id)->first();
            $supplier = $purchaseOrders->nama_perusahaan;
            $perusahaan = Perusahaan::where('nama_perusahaan', $supplier)->first();
            $perusahaankita = Perusahaan::where('kode_perusahaan', $user->kode_perusahaan)->first();
            $detailTotal = 0;
            $detailBarang = 0;
            $hargaAfterDiskon = 0;
            $totalHargaSemua = 0;
            $detail = [];
            $barang = [];
            $kodeBarangArray = [];

            $details = detail_po::where('id_po', $purchaseOrders->id_po)->with('barang')->latest()->first();
            if ($details) {
                $detaillagi = detail_po::where('id_po', $purchaseOrders->id_po)->get();
                $detail[] = $detaillagi;
                $kodeBarangArray = $details->barang->kode_barang;
                foreach ($detaillagi as $detailItem) {
                    $barang = Barang::where('barang_id', $detailItem->barang_id)->first();
                }
            }

            return view('barang.barangmasuk.po.print', compact('purchaseOrders', 'detailTotal', 'detailBarang', 'detail', 'perusahaan', 'totalHargaSemua', 'barang', 'kodeBarangArray', 'perusahaan', 'perusahaankita'));
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function edit(Request $request, $id)
    {
        try {
            $purchaseOrder = PurchaseOrder::where('id_po', $id)->first();

            if (!$purchaseOrder) {
                return redirect()->back()->with('error', 'Purchase order data not found.');
            }

            $nyariperusahaan = Perusahaan::where('kode_perusahaan', $purchaseOrder->nama_perusahaan)->first();
            $barang = Barang::where('nama_barang', $purchaseOrder->nama_barang)->where('Perusahaan', $nyariperusahaan->kode_perusahaan)->first();
            $ceklagi = Barang::where('barang_id', $barang->barang_id)->where('Perusahaan', $barang->Perusahaan)->first();

            if (!$barang) {
                return redirect()->back()->with('error', 'Barang tidak ditemukan.');
            }

            $purchaseOrder->update([
                'tanggal_po' => $request->nama_barang,
                'Perusahaan' => $request->nama_perusahaan,
            ]);

            return redirect('/dataPO')->with('success', 'Data berhasil diubah');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan.');
        }
    }

    public function update($id, $validatedData)
    {
        try {
            $data = detail_po::find($id);
            $data->update($validatedData);
            $kategori = $data->kategori_barang;

            return redirect('/kategori')->with('update', 'Kategori Barang <strong>' . $kategori . '</strong> berhasil diupdate.');
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function purchaseOrder()
    {
        try {
            $latestPurchaseOrder = PurchaseOrder::latest()->first();
            $nextId = $latestPurchaseOrder ? ($latestPurchaseOrder->id + 1) : 1;
            $idFormatted = str_pad($nextId, 4, '0', STR_PAD_LEFT);
            $purchaseOrderId = 'PO-' . $idFormatted;
            $termin = Termin::all();
            $tanggalHariIni = Carbon::now()->setTimezone('Asia/Jakarta')->toDateString();
            $barang = Barang::all();
            $Perusahaan = Perusahaan::all();
            $PerusahaanOptions = Barang::select('barangs.Perusahaan as barang_id', 'barangs.nama_barang', 'perusahaans.kode_perusahaan as Perusahaan_id', 'perusahaans.nama_perusahaan as Perusahaan_nama')
                ->leftJoin('perusahaans', 'barangs.Perusahaan', '=', 'perusahaans.kode_perusahaan')
                ->get();

            return view('barang.barangmasuk.po.create', compact('barang', 'Perusahaan', 'PerusahaanOptions', 'purchaseOrderId', 'tanggalHariIni', 'termin'));
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function CreatepurchaseOrder(Request $request)
    {
        try {
            $selectedItemsArray = $request->input('selectedItems');
            $selectedItemsArrayArray = json_decode($selectedItemsArray, true);
            $id = auth()->user();

            $request->validate([
                'tanggal_po' => 'required|date',
                'kode_perusahaan' => 'required|string|max:255',
                'termin' => 'nullable|string|max:255',
                'jatuh_tempo' => 'nullable|date',
                'tanggal_termin' => 'required|date',
                'selectedItems' => 'required|array',
                'selectedItems.*.barang_id' => 'required|string',
                'selectedItems.*.nama_barang' => 'required|string',
                'selectedItems.*.quantity' => 'required|integer|min:1',
                'selectedItems.*.price' => 'required|numeric|min:0',
                'selectedItems.*.discount' => 'nullable|numeric|min:0',
                'selectedItems.*.discountpersen' => 'nullable|numeric|min:0',
                'selectedItems.*.total' => 'required|numeric|min:0',
            ]);

            if ($request->filled('termin') && $request->filled('jatuh_tempo')) {
                return redirect()->back()->with('error', 'Jatuh tempo harap tidak diisi dua-duanya');
            }

            if (!$request->filled('termin') && !$request->filled('jatuh_tempo')) {
                return redirect()->back()->with('error', 'Jatuh tempo diisi salah satunya yang sudah ada atau buat baru');
            }

            $pusinglo = Perusahaan::where('kode_perusahaan', $request->kode_perusahaan)->first();

            if ($request->filled('termin')) {
                $termin = Termin::where('kode_termin', $request->input('termin'))->first();
                $tanggal_termin = Carbon::parse($request->input('tanggal_po'))->addDays($termin->jatuh_tempo)->toDateString();
            } else {
                $tanggal_termin = $request->input('tanggal_termin');
            }

            $poline = po_line::create([
                'user_id' => $id->id,
                'hariini' => now()->toDateString(),
            ]);
            $id_po = $poline->id_po;

            $purchaseOrder = PurchaseOrder::create([
                'id_po' => $poline->id_po,
                'user' => $id->name,
                'tanggal_po' => $request->tanggal_po,
                'kode_perusahaan' => $pusinglo->kode_perusahaan,
                'nama_perusahaan' => $pusinglo->nama_perusahaan,
                'jatuh_tempo' => $tanggal_termin,
            ]);

            foreach ($selectedItemsArrayArray as $selectedItem) {
                detail_po::create([
                    'id_po' => $poline->id_po,
                    'barang_id' => $selectedItem['barang_id'],
                    'nama_barang' => $selectedItem['nama_barang'],
                    'satuan' => $selectedItem['satuan'],
                    'stok' => $selectedItem['quantity'],
                    'harga' => $selectedItem['price'],
                    'potongan' => $selectedItem['discount'] ?? 0,
                    'diskon' => $selectedItem['discountpersen'] ?? 0,
                    'total_harga' => $selectedItem['total'],
                ]);
            }

            return redirect('app/purchaseorder/data')->with('success', 'PO <strong>' . $id_po . '</strong> berhasil ditambah');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function CreatepurchaseOrderSeeder($validatedData)
    {
        try {
            $selectedItemsArray = $validatedData['selectedItems'];
            $selectedItemsArrayArray = json_decode($selectedItemsArray, true);
            $id = auth()->user();
            if ($id === null) {
                $id = $validatedData['id'];
            }

            $termin = $validatedData['termin'];
            $jatuh_tempo = $validatedData['jatuh_tempo'];
            $tanggal_termin = $validatedData['tanggal_termin'];

            $poline = po_line::create([
                'user_id' => $id,
                'hariini' => now()->toDateString(),
            ]);
            $id_po = $poline->id_po;

            $pusinglo = Perusahaan::where('kode_perusahaan', $validatedData['kode_perusahaan'])->first();

            if ($termin) {
                $tanggal_termin = Carbon::parse($validatedData['tanggal_po'])->addDays(Termin::where('kode_termin', $termin)->first()->jatuh_tempo)->toDateString();
            } else {
                $tanggal_termin = $jatuh_tempo;
            }

            $purchaseOrder = PurchaseOrder::create([
                'id_po' => $poline->id_po,
                'user' => $validatedData['name'],
                'tanggal_po' => $validatedData['tanggal_po'],
                'kode_perusahaan' => $pusinglo->kode_perusahaan,
                'nama_perusahaan' => $pusinglo->nama_perusahaan,
                'jatuh_tempo' => $tanggal_termin,
            ]);

            foreach ($selectedItemsArrayArray as $selectedItem) {
                detail_po::create([
                    'id_po' => $poline->id_po,
                    'barang_id' => $selectedItem['barang_id'],
                    'nama_barang' => $selectedItem['nama_barang'],
                    'satuan' => $selectedItem['satuan'],
                    'stok' => $selectedItem['quantity'],
                    'harga' => $selectedItem['price'],
                    'potongan' => $selectedItem['discount'] ?? 0,
                    'diskon' => $selectedItem['discountpersen'] ?? 0,
                    'total_harga' => $selectedItem['total'],
                ]);
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
