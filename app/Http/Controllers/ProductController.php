<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Inertia\Inertia;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(5);
        return Inertia::render('product/Index', ['products' => $products]);
    }

    public function create()
    {
        return Inertia::render('product/Create');
    }

    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();
        $product = Product::create([
            'name' => $data['name'],
            'price' => $data['price'],
        ]);
        $product->save();

        return to_route('products.index')->with('message', 'Product created successfully');
    }

    public function edit(Product $product)
    {
        return Inertia::render('product/Edit', ['product' => $product]);
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->validated();

        $product->update($data);

        return redirect()->route('products.index')->with('message', 'Updated successfully');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('message', 'Deleted successfully');
    }
}
