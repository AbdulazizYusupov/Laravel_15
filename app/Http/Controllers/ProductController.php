<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $models = Product::orderBy('id', 'desc')->paginate(10);
        return view('product.index', compact('models'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Product::create($data);
        return redirect()->route('product.index');
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->all();
        $product->update($data);
        return redirect()->route('product.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index');
    }
}
