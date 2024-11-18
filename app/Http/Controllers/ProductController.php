<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Validator as ValidationValidator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::get();

        return response()->json(['data' => $data], 200);
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
        $validator = Validator::make($request->all(), Product::rules('insert'));
        Product::customValidation($validator);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->messages()], 400);
        }

        try {
            $data = Product::create($request->all());

            return response()->json(['message' => 'Data berhasil disimpan', 'data' => $data], 200);
        } catch (\Throwable $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $data = Product::findOrFail($id);

            return response()->json(['data' => $data], 200);
        } catch (\Throwable $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $data = Product::findOrFail($id);

            return response()->json(['data' => $data], 200);
        } catch (\Throwable $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), Product::rules('update'));
        Product::customValidation($validator);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->messages()], 400);
        }

        try {
            $data = Product::findOrFail($id);
            $data->update($request->all());

            return response()->json(['message' => 'Data berhasil diupdate', 'data' => $data], 200);
        } catch (\Throwable $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = Product::findOrFail($id);
            $data->delete();

            return response()->json(['message' => 'Data berhasil dihapus'], 200);
        } catch (\Throwable $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        }
    }
}