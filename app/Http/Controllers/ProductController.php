<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Redirect;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud_products');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = new Product();
        $product->name_product = $request->name_product;
        $product->description_product = $request->description_product;
        $product->price_product = str_replace(".", "", str_replace(",", "", $request->price_product));

        if ($request->hasFile('image_product')) {
            $image = $request->file('image_product');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('images', $filename, 's3');
        }
        $product->image_product = $path ?? "";

        $product->save();

        return Redirect::to('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function image($id)
    {
        $product = Product::findOrFail($id);

        $image = Storage::disk('s3')->get($product->image_product);

        return response($image, 200)->header('Content-Type', 'image/jpeg');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($product)
    {
        $edit = product::findOrFail($product);
        return view('crud_products', ['edit' => $edit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id_product)
    {
        $update = product::findOrFail($id_product);

        if($request->hasFile('image_product')) {
            $filenameWithExt = $request->file('image_product')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image_product')->getClientOriginalExtension();
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            $path = $request->file('image_product')->storeAs('public/image', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.png';
        }

        $update -> update([
            'name_product' => $request->name_product,
            'description_product' => $request->description_product,
            'price_product' =>  str_replace("." , "" ,str_replace("," , "" ,$request->price_product)),
            'image_product' => $fileNameToStore,
        ]);
        return Redirect::to('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_product)
    {
        $delete = product::findOrFail($id_product);
        $delete -> delete();
        return Redirect::to('/');
    }
}
