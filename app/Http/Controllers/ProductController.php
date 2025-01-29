<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::where('is_active', 1)->paginate(2);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Gate::allows('product-manage')){
            return view('products.create');
        }
        abort(403);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        if (Gate::allows('product-manage')){
            $product=Product::create($request->all());
            if($product){
                return to_route('products.index');
            }else{
                return to_route('products.create');
            }
        }
        abort(403);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        if (Gate::allows('product-manage')){
            return view('products.update', compact('product'));
        }
        abort(403);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        if (Gate::allows('product-manage')){
            $status = $product->update($request->all());
            if($status){
                return to_route('products.index');

            }else{
                return to_route('products.edit', $product);
            }
        }
        abort(403);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if (Gate::allows('product-delete')){
            $product->update(['is_active' => 0]);
            return to_route('products.index');
        }
        abort(403);
    }
}
