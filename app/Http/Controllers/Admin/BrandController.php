<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::get();
        return view('admin.pages.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = $file->store('brands', 'public');
            $data['image'] = "storage/" . $fileName;
        }
        
        Brand::create($data);

        return redirect(route('brands.index'))->with('status', 'Brand Created Successfully');
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
    public function edit(string $id)
    {
        $brand = Brand::findorFail($id);
        return view('admin.pages.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = $file->store('categories', 'public');
            $data['image'] = "storage/" . $fileName;
        }
        
        Brand::findOrFail($id)->update($data);

        return redirect(route('brands.index'))->with('status', 'Brand Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Brand::findOrFail($id)->delete();
        return redirect()->route('brands.index')->with('status', 'Brand Deleted Successfully');
    }
}
