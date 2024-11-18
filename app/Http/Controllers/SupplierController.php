<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SupplierController extends Controller
{
    public function index()
    {
        // Mengambil semua produk beserta suppliernya
        $suppliers = Supplier::with('supplier')->get();

        // Mengembalikan data dalam format JSON
        return response()->json($suppliers);
    }

    public function store(Request $request)
    {
        // Validasi input menggunakan aturan dari model
        $validator = Validator::make($request->all(), Supplier::rules('insert'));

        if ($validator->fails()) {
            return response()->json(['message' => $validator->messages()], 400);
        }

        try {
            // Membuat produk baru jika validasi berhasil
            $suppliers = Supplier::create($request->all());

            return response()->json(['message' => 'Data berhasil disimpan', 'data' => $suppliers], 200);
        } catch (\Throwable $suppliers) {
            return response()->json(['message' => $suppliers->getMessage()], 500);
        }
    }
}
