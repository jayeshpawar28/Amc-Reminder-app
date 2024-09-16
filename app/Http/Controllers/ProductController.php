<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use App\Http\Requests\UpdateProductModelRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ProductModel::all();
        return view('product.product_list', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.product_add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $req->validate([
            'product_name' => 'required',
            'product_rate' => 'required',
        ]);

        $data = ProductModel::create([
            'product_name' => $req->product_name,
            'product_rate' => $req->product_rate,
            'remark' => $req->remark,
        ]);

        if ($data) {
            return redirect()->route('product.index')->with('msg', 'New Product Added');
        }
        return view('product.product_add');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductModel $productModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = ProductModel::find($id);
        return view('product.product_add', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, $id)
    {
        $product = ProductModel::find($id);

        $req->validate([
            'product_name' => 'required',
            'product_rate' => 'required',
        ]);

        if($product){
            $product->update([
                'product_name' => $req->product_name,
                'product_rate' => $req->product_rate,
                'remark' => $req->remark,
            ]);
            return redirect()->route('product.index')->with('msg', 'Product updated');
        }
        return view('product.product_add');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = ProductModel::find($id);
        
        if($product){
           $product->delete();
            return redirect()->route('product.index')->with('delete', 'Product Deleted');
        }
        return view('product.product_add');
    }
}
