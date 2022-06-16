<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return Product::when(request('search'), function($query) {
            $query->where("name", "LIKE", "%" . request('search') . "%");
        })->orderBy('id','desc')->paginate(5);
    }

    public function store(ProductStoreRequest $request)
    {
        return Product::create($request->only('name', 'price'));
    }

    public function show(Product $product)
    {
        return $product;
    }

    public function update(ProductUpdateRequest $request, Product $product)
    {
        $product->update($request->only('name','price'));
        return 'Updated Successfully';
    }

    public function destroy(Product $product)
    {
       $product->delete();
        return 'Deleted Successfully';
    }
}
