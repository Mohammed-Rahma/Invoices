<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.products.index', [
           'products' => Product::all(),
           'sections'=>Section::all(),
        ]);
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

        $request->validate([
            'name' => 'required|unique:products|max:255',
            'description' => 'required',
        ], [
            'name.required' => 'يرجى ادخال اسم المنتج',
            'name.unique' => 'اسم المنتج المدخل موجود مسبقا',
            'description.required' => 'يرجى ادخال الملاحظات ',
        ]);

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'section_id'=>$request->section_id,
        ]);
        return redirect()->route('products.index')->with('Add', 'تم التسجيل بنجاح');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $request->validate([
            'name' => 'required|unique:products|max:255'.$id,
            'description' => 'required',
        ], [
            'name.required' => 'يرجى ادخال اسم المنتج',
            'name.unique' => 'اسم المنتج المدخل موجود مسبقا',
            'description.required' => 'يرجى ادخال الملاحظات ',
        ]);
        $products = Product::findorfail($id);
        $products->update([
            'name' => $request->name,
            'description' => $request->description,
            'section_id'=>$request->section_id,
        ]);
        return redirect()->route('products.index')->with('Add', 'تم التسجيل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
