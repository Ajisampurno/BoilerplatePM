<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index()
    {
        $data = Sales::select('sales_date', 'name', 'sales_amount',)
            ->join('products', 'products.id', '=', 'sales.product_id')
            ->get();

        return response()->json($data);
    }
}
