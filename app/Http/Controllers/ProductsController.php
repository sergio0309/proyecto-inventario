<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = products::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = categories::all();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new products();

        $product->name = $request->name;
        $product->description = $request->description;
        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->status = true;
        $product->slog = $this->create_slug($request->name);
        $product->image = $request->image->store("images", "public");
        $product->save();

        return redirect('/products');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slog)
    {
        $product = products::where('slog', $slog)->first();
        // $category = categories::find($product->category_id);
        // // dd($category);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = products::find($id);
        $product->delete();

        return redirect()->back();
    }

    private function create_slug ( string $text) {
        $text = strtolower($text);
        $text = preg_replace( '/[^a-z0-9]+/', '-', $text );
        $text = trim($text, '-');
        $text = preg_replace('/-+/', '-', $text);
        return $text;
    }
}
