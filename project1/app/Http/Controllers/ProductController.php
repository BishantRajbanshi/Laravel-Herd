<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductStoreRequest;

class ProductController extends Controller
{
    public function index(Request $request){
        $products = Product::when($request->name, function($query, $name){
                return $query->where('Title', $name);
            })
            ->when($request->price, function($query, $price){
                return $query->orWhere('price', $price);
            })
            ->get();
        return response()->json($products, 200);
    }

    public function store(ProductStoreRequest $request)
    {
        $product = Product::create($request->all());
        return response()->json($product, 201);
    }

    public function show($Title){
        $product = Product::findOrFail($Title);
        return response()->json($product, 200);
    }

    public function update(Request $request, $Title){
        $product = Product::findOrFail($Title);
        $product->update($request->all());
        return response()->json($product, 200);
    }

    public function destroy($Title){
        $product = Product::findOrFail($Title);
        $product->delete();
        return response()->json(null, 204);
    }
}
