<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SaleRequest;
use App\Models\Sale;
use App\Models\Product;
use Redirect;

class SaleController extends Controller
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
    public function create(Request $request)
    {
        $product = product::get();
        return view('crud_sales', ['product'=>$product]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaleRequest $request)
    {
        sale::create([
            'product_id' => $request->product_id,
            'date_sale' => $request->date_sale,
            'name_client' => $request->name_client,
            'email_client' => $request->email_client,
            'cpf_client' => $request->cpf_client,
            'quantity_sale' => $request->quantity_sale,
            'discounts_sale' => str_replace("," , "" ,$request->discounts_sale),
            'status_sale' => $request->status_sale,
        ]);

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
    public function edit($id_sale)
    {
        $editProduct = product::get();
        $edit = sale::findOrFail($id_sale);
        return view('crud_sales', ['edit' => $edit, 'editProduct'=> $editProduct]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaleRequest $request, $id_sale)
    {
        $update = sale::findOrFail($id_sale);
        $update -> update([
            'product_id' => $request->product_id,
            'date_sale' => $request->date_sale,
            'name_client' => $request->name_client,
            'email_client' => $request->email_client,
            'cpf_client' => $request->cpf_client,
            'quantity_sale' => $request->quantity_sale,
            'discounts_sale' => str_replace("," , "" ,$request->discounts_sale),
            'status_sale' => $request->status_sale,
        ]);
        return Redirect::to('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_sale)
    {
        $delete = sale::findOrFail($id_sale);
        $delete -> delete();
        return Redirect::to('/');
    }
}
