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
        $saleInvoice = DB::table('products')->get();

        $customerInfo = DB::table('customers')->get();

        return view('livewire.dashboard',['saleInvoice'=>$saleInvoice,'customerInfo'=>$customerInfo]);
    }
}
