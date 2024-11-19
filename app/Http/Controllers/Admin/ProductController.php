<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category', 'brand', 'tags')->get();
        return view('admin.pages.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        $brands = Brand::get();
        $tags = Tag::get();
        return view('admin.pages.products.create', compact('categories', 'brands', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $data = $request->validated();
        
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = $file->store('products', 'public');
            $data['image'] = "storage/" . $fileName;
        }

        $product = Product::create($data);
        $product->tags()->syncWithoutDetaching($request->tags);

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::get();
        $brands = Brand::get();
        $tags = Tag::get();
        return view('admin.pages.products.edit', compact('product', 'categories', 'brands', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = $file->store('products', 'public');
            $data['image'] = "storage/" . $fileName;
            $product->image = $data['image'];
        }

        $product->tags()->syncWithoutDetaching($request->tags);
        $product->update($data);
        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully');
    }
}
