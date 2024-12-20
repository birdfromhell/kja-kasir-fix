<?php

namespace App\Http\Controllers;

use App\Models\detail_po;
use App\Models\PenerimaanBarang;
use App\Models\po_line;
use App\Models\PurchaseOrder;
use App\Models\Barang;
use App\Models\Termin;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\StorePurchaseOrderRequest;
use App\Http\Requests\UpdatePurchaseOrderRequest;
use App\Repository\PurchaseOrder\PurchaseOrderRepository;

class PurchaseOrderController extends Controller
{
    protected $purchaseOrderRepository;
    public function __construct(
        PurchaseOrderRepository $purchaseOrderRepository
    ) {
        $this->purchaseOrderRepository = $purchaseOrderRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $id = auth()->user()->id;
            return $this->purchaseOrderRepository->index($id);
        } catch (Exception $e) {
            return redirect('/dataPO')->with('error', 'Error retrieving purchase orders.');
        }
    }

    public function print($id)
    {
        try {
            return $this->purchaseOrderRepository->print($id);
        } catch (Exception $e) {
            return redirect('/dataPO')->with('error', 'Error retrieving purchase orders.');
        }
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
{
    try {
        // Add more robust validation
        $validatedData = $request->validate([
            'nama_supplier' => 'required',
            'barang' => 'required',
            // Add other necessary validation rules
        ]);

        // Log the incoming request for debugging
        \Log::info('Purchase Order Create Request:', $request->all());

        // Use the repository or direct model creation
        $purchaseOrder = $this->purchaseOrderRepository->CreatepurchaseOrder($request);

        return response()->json([
            'success' => true,
            'message' => 'Purchase Order berhasil dibuat',
            'data' => $purchaseOrder
        ]);
    } catch (\Illuminate\Validation\ValidationException $e) {
        // Handle validation errors
        return response()->json([
            'success' => false,
            'message' => 'Validation Error',
            'errors' => $e->errors()
        ], 422);
    } catch (\Exception $e) {
        // Log the full exception
        \Log::error('Purchase Order Create Error: ' . $e->getMessage());
        \Log::error('Exception Trace: ' . $e->getTraceAsString());
        

        return response()->json([
            'success' => false,
            'message' => $e->getMessage()
        ], 500);
    }
}
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima dari frontend
        $validated = $request->validate([
            'tanggal_po' => 'required|date',             // Pastikan tanggal_po adalah tanggal yang valid
            'kode_perusahaan' => 'required|string|max:255',  // Kode perusahaan harus berupa string dan maksimal 255 karakter
            'termin' => 'required|integer|min:1',           // Termin harus integer dengan nilai minimal 1
            'jatuh_tempo' => 'required|date',               // Jatuh tempo harus berupa tanggal yang valid
            'tanggal_termin' => 'required|date',            // Tanggal termin harus berupa tanggal yang valid
            'selectedItems' => 'required|array',            // Pastikan selectedItems adalah array
            'selectedItems.*' => 'required|string',         // Setiap item dalam array selectedItems harus berupa string
        ]);
    
        try {
            // Proses untuk menyimpan data setelah validasi berhasil
            $purchaseOrder = new PurchaseOrder(); // Asumsi PurchaseOrder adalah model untuk menyimpan data pesanan
    
            $purchaseOrder->tanggal_po = $request->tanggal_po;
            $purchaseOrder->kode_perusahaan = $request->kode_perusahaan;
            $purchaseOrder->termin = $request->termin;
            $purchaseOrder->jatuh_tempo = $request->jatuh_tempo;
            $purchaseOrder->tanggal_termin = $request->tanggal_termin;
            // Menyimpan data lain seperti selectedItems jika perlu
            // Misalnya: mengonversi selectedItems menjadi sesuatu yang bisa disimpan (misalnya serialized atau JSON)
            $purchaseOrder->selected_items = json_encode($request->selectedItems);
    
            $purchaseOrder->save(); // Simpan data
    
            // Jika berhasil, kembalikan response sukses
            return response()->json([
                'message' => 'Purchase Order berhasil disimpan.',
                'data' => $purchaseOrder
            ], 200);
    
        } catch (\Exception $e) {
            // Tangani error jika terjadi saat menyimpan data
            return response()->json([
                'message' => 'Gagal menyimpan Purchase Order.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(PurchaseOrder $purchaseOrder)
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
                'nama_perusahaan' => 'required',
            ]);
            if (!$request) {
                return redirect()->back()->with('error', 'Purchase order data not found.');
            }
            return $this->purchaseOrderRepository->edit($request, $id);
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateStatus($id, $data)
    {
        try {
            // Find the Purchase Order
            $purchaseOrder = PurchaseOrder::findOrFail($id);
    
            // Update the status
            $purchaseOrder->update([
                'status' => $data['status']
            ]);
    
            return true;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PurchaseOrder $purchaseOrder)
    {
        //
    }

    public function purchaseOrder()
    {
        try {
            return $this->purchaseOrderRepository->purchaseOrder();
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
        // Find the latest purchase order
    }

    public function CreatepurchaseOrder(Request $request)
    {
        \Log::info('Purchase Order Creation Request:', $request->all());
    
        try {
            // Validate input
            $validatedData = $request->validate([
                'nama_supplier' => 'required',
                'tanggal' => 'required|date',
                'jatuh_tempo' => 'required|date',
                // Add other necessary validation rules
            ]);
    
            // Use DB transaction for better error handling
            DB::beginTransaction();
            try {
                // Directly create the purchase order or use repository
                $purchaseOrder = PurchaseOrder::create([
                    'nama_supplier' => $request->nama_supplier,
                    'tanggal' => $request->tanggal,
                    'jatuh_tempo' => $request->jatuh_tempo,
                    'status' => 'pending', // Default status
                    'user_id' => auth()->id(), // Add user who created the PO
                    // Add other necessary fields
                ]);
    
                DB::commit();
    
                // Return success response
                return response()->json([
                    'success' => true,
                    'message' => 'Purchase Order berhasil dibuat',
                    'data' => $purchaseOrder
                ]);
            } catch (\Exception $e) {
                DB::rollBack();
                \Log::error('Purchase Order Creation Error (DB): ' . $e->getMessage());
                \Log::error('Error Trace: ' . $e->getTraceAsString());
    
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal membuat Purchase Order: ' . $e->getMessage()
                ], 500);
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Handle validation errors
            \Log::error('Validation Error: ' . json_encode($e->errors()));
    
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'errors' => $e->errors()
            ], 422);
        }
    
    }

        

        
    public function status(Request $request, $id)
    {
        try {
            // Log the incoming request for debugging
            \Log::info('Status Update Request:', [
                'id' => $id,
                'request_data' => $request->all()
            ]);
    
            // Validate the request if needed
            $validatedData = $request->validate([
                'status' => 'required|in:pending,approved,rejected'
            ]);
    
            // Perform the status update
            $result = $this->purchaseOrderRepository->updateStatus($id, $validatedData);
    
            if ($result) {
                return response()->json([
                    'success' => true,
                    'message' => 'Status updated successfully'
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to update status'
                ], 400);
            }
        } catch (Exception $e) {
            // Log the full exception
            \Log::error('Status Update Error: ' . $e->getMessage());
            \Log::error('Exception Trace: ' . $e->getTraceAsString());
    
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}