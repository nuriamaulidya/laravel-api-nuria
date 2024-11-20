<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;


class ProductController extends Controller
{
    public function index()
    {
        $data = Product::get();
        return response()->json(['data' => $data], 200);
    }

    public function store(Request $request)
    {
        // Validasi input menggunakan aturan dari model
        $validator = Validator::make($request->all(), Product::rules('insert'));

        if ($validator->fails()) {
            return response()->json(['message' => $validator->messages()], 400);
        }

        try {
            // Membuat produk baru jika validasi berhasil
            $products = Product::create($request->all());

            return response()->json(['message' => 'Data berhasil disimpan', 'data' => $products], 200);
        } catch (\Throwable $products) {
            return response()->json(['message' => $products->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $data = Product::find($id);

            return response()->json(['data' => $data], 200);
        } catch (\Throwable $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }


    public function update(Request $request, string $id)
    {
        /** @var IlluminateValidator $validator */
        $validator = Validator::make($request->all(), Product::rules('update'));
        Product::customValidation($validator);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->messages()], 400);
        }

        try {
            $data = Product::find($id);
            $data->update($request->all());

            return response()->json(['message' => 'Data berhasil diupdate', 'data' => $data]);
        } catch (\Throwable $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function destroy(string $id)
    {
        try {
            $data = Product::find($id);
            $data->delete();

            return response()->json(['message' => 'Data berhasil dihapus'], 200);
        } catch (\Throwable $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
