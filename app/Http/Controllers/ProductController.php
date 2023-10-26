<?php

namespace App\Http\Controllers;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::paginate(10);
        return view('products.index', ['products' => $products]);    
    }

    public function productList()
    {
        $products = Product::all();

        return view('products.store', ['products' => $products]);
    }



    public function create(){
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataProduct = new Product;

        $rules = [
            'name' => 'required',
            'category' => 'required',
            'qty' => 'required',
            'price' => 'required',
            'descriptions' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'failed to store',
                'data' => $validator->errors(),
            ]);
        }

        $dataProduct->name = $request->name;
        $dataProduct->category = $request->category;
        $dataProduct->qty = $request->qty;
        $dataProduct->price = $request->price;
        $dataProduct->descriptions = $request->descriptions;

        $post = $dataProduct->save();
        
        // return response()->json([
        //     'status' => true,
        //     'message' => 'product stored successfully',
        // ]);

        return redirect(route('product.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Product::find($id);
        if($data) {
            return response()->json([
                'status' => true,
                'message' => 'data ditemukan',
                'data' => $data,
            ], 200);
        }
        else {
            return response()->json([
                'status' => false,
                'message' => 'data tidak ditemukan',
            ]);
        }
    }

    public function edit(Product $product){
        return view('products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataProduct = Product::find($id);

        if(empty($dataProduct)) {
            return response()->json([
                'status' => false,
                'message' => 'data not found',
            ], 404);
        }

        $rules = [
            'name' => 'required',
            'category' => 'required',
            'qty' => 'required',
            'price' => 'required',
            'descriptions' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'failed to update',
                'data' => $validator->errors(),
            ]);
        }

        $dataProduct->name = $request->name;
        $dataProduct->category = $request->category;
        $dataProduct->qty = $request->qty;
        $dataProduct->price = $request->price;
        $dataProduct->descriptions = $request->descriptions;

        $post = $dataProduct->save();

        return redirect(route('product.index'))->with('success', 'Product Updated Succesffully');
        
        // return response()->json([
        //     'status' => true,
        //     'message' => 'product updated successfully',
        // ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $dataProduct = Product::find($id);
    
        if (empty($dataProduct)) {
            return redirect(route('product.index'))->with('error', 'Product not found');
        }
    
        $dataProduct->delete();
    
        return redirect(route('product.index'))->with('success', 'Product deleted successfully');
    }
    
}
