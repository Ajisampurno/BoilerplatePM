<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function getMonthlySales()
    {
        $sales = Sales::select(DB::raw('DATE_FORMAT(sales_date, "%Y-%m") as month'), DB::raw('SUM(sales_amount) as total_sales'))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        return response()->json($sales);
    }

    public function getAnnualSales()
    {
        $sales = Sales::select(DB::raw('YEAR(sales_date) as year'), DB::raw('SUM(sales_amount) as total_sales'))
            ->groupBy('year')
            ->orderBy('year')
            ->get();

        return response()->json($sales);
    }

    public function getSalesByPerson()
    {
        $sales = Sales::join('salespeople', 'sales.salesperson_id', '=', 'salespeople.id')
            ->select('salespeople.name as salesperson', DB::raw('SUM(sales_amount) as total_sales'))
            ->groupBy('salespeople.name')
            ->get();

        return response()->json($sales);
    }

    public function getProducts()
    {
        $products = Product::select('name', 'qty')->get();
        return response()->json($products);
    }
}
