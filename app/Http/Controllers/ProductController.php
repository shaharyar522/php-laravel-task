<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
        public function index()
    {
        return response()->json(Product::latest()->paginate(10));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
        ]);

        return Product::create($request->all());
    }

    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
