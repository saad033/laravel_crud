<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use Illuminate\Support\facades\DB;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function showPost()
    {
//        $products = DB::table('products')->get();
//
//        $customerInfo = DB::table('customers')->get();
        $data = DB::table('products')
            ->join('customers','customers.id','=','products.product_id')
           ->get();
//  dd($data);

        return view('livewire.dashboard',['data'=>$data]);
    }


}
