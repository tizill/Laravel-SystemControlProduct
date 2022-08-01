<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sale;

class DashboardController extends Controller
{
    public function index()
    {
        $product = product::get();
        $search = request('search');
        if($search != 0){
            $sale = sale::join('products', 'sales.product_id', '=', 'products.id_product')->where('id_sale', '=', $search)->get();
        }else{
             $sale = sale::join('products', 'sales.product_id', '=', 'products.id_product')->get();
        }
        $results = sale::select('status_sale',sale::raw('SUM(sales.quantity_sale) AS total_quantity'),sale::raw('SUM(((products.price_product * sales.quantity_sale) - sales.discounts_sale)) AS price_product_total'))
        ->join('products', 'sales.product_id', '=', 'products.id_product')
        ->groupBy('status_sale')
        ->get();

        return view('dashboard', ['product'=>$product, 'sale'=>$sale, 'results'=>$results]);
    }
}
