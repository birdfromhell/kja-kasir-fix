<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\YourModel; // Ganti dengan model yang sesuai

class SearchController extends Controller
{
    public function search(Request $request)
    {
        // Mengambil query pencarian
        $query = $request->input('query');

        // Melakukan pencarian berdasarkan query (gunakan model yang sesuai)
        $results = YourModel::where('column_name', 'like', '%' . $query . '%')->get(); // Ganti dengan kolom yang sesuai

        // Kembalikan hasil pencarian
        return response()->json($results);
    }
}
