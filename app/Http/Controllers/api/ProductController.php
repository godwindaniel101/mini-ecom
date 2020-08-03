<?php

namespace App\Http\Controllers\api;

use App\Product;
use PHPUnit\Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Traits\GeneralScopes;

class ProductController extends Controller
{ use GeneralScopes;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::paginate(10);
        return response()->json($product, 201);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
       
    { 
        try{  $validatedData = $request->validate([
            'name' => ['required'],
            'cost' => ['required'],
            'description' => ['required'],
            'image' => ['required'],
        ]);
        //backend validation to prevent site injection
       
        
        $new_image_name = $this->moveImage($request->image);
        $product = new Product([
            'name' => $request->name,
            'cost' => $request->cost,
            'description' => $request->description,
            'image' => $new_image_name
        ]);
        $product->save();
        
        return response()->json([
            'message' => 'Product Successfully Created!',
            'product_id' => $product->id,
        ], 201);
    }catch(Exception $e){
        return response()->json([
            $e->getMessage()
        ], 422);
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where('id' , $id)->first();
        return response()->json($product, 201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // return $id;
        $product = Product::where('id',$id)->first();
        return response()->json($product, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::where('id',$id);
        if($product->first()->image == $request->image){
           $new_image_name = $request->image;
        }else{
            $new_image_name = $this->moveImage($request->image);
        }
        $product->update([
            'name' => $request->name,
            'cost' => $request->cost,
            'description' => $request->description,
            'image'=> $new_image_name
        ]);
        return response()->json([
            'message' => 'Product Successfully Updated!',
            'product_id' => $product->first()->id,
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::where('id',$id)->delete();
        return response()->json([
            'message' => 'Product Successfully Deleted!',
        ], 201);
    }
}
