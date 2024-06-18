<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   
        return view('products');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function fetchproduct(Request $request)
    {   
        $products = Products::all();
        return response()->json([
            'products'=>$products,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {  
        // if($validator->fails()){ 
        //     return response()->json([
        //     'status' => 400,
        //     'errors' => $validator->messages()
        //     ]); 
        // }
        // else{
            $products = new Products;
            $products->club_id = $request->input('club_id');
            $products->title = $request->input('title');
            $products->product_title = $request->input('product_title');
            $products->type = $request->input('type');
            $products->save();
            return response()->json([
                'status' => 200,
                'message' => 'Product Added successfully'
            ]);
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show(Products $products)
    {   
        if($products){
            return response()->json(['status' => 'success', 'data' => $products]);
        }
        else{
        return response()->json(['status' => 'Failed', 'data' => 'no products Found']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $products = Products::where('id',$id)->first();
        
        return response()->json(['Data'=>$products]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Products $products,$id)
    {
    //    $products = Products::updateOrCreate(
    //     [
    //         'id' => $id
    //     ],
    //     [
    //         'club_id'=>$request->input('club_id'),
    //         'title' => $request->input('title'),
    //         'product_title' => $request->input('product_title'),
    //          'type' => $request->input('type')
    //     ]); 
    //         if($products){
    //             return response()->json([
    //                 'status'=>200,
    //                 'message'=>'product Updated Successfully.'
    //             ]);
    //         }
    //         else {
    //             return response()->json([
    //                 'status'=>'Failed',
    //                 'message'=>'product not Updated.'
    //             ]);
    //         }

            $products = new Products;
            $products->club_id = $request->input('club_id_edit');
            $products->title = $request->input('title_edit');
            $products->product_title = $request->input('product_title_edit');
            $products->type = $request->input('type_edit');
            $products->update();
            $products->save();
            return response()->json([
                'status' => 200,
                'message' => 'Product Added successfully'
            ]);
               
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Products $products,$id)
    {
        $products = Products::find($id);
        if($products)
        {
            $products->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Product Deleted Successfully.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Product Found.'
            ]);
        }
    }
}
