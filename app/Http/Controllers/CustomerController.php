<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Support\Facades\DB;


class CustomerController extends Controller
{
//    protected $customer;
//    public function __construct()
//    {
//       $customer = $this->customer = new Customer();
//    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       return view('livewire.customers');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //

//        DB::table('')
//        $customer->name = $request->name;
//        $customer->address = $request->address;
//        $this->customer->number = $request->phone_number;
//        $this->customer->$request->save();
//        $product = $request->product();
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->phone_number = $request->number;
        $customer->save();
        return view('livewire.products',['customer'=>$customer]);
//        return redirect(route('product_index'))->with('status','Record Added');



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
        $customer = Customer::find($id);
        return view('livewire.editCustomer',['customer'=>$customer]);
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
        //
        $product = Customer::find($id);
        $product->name = $request->name;
        $product->address =$request->address;
        $product->phone_number = $request->number;
        $product->save();

        return redirect(route('dashboard'))->with('status','Record Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
//        $customer = Customer::find($id);
//        $customer->delete();
        $data = DB::table('products')
            ->join('customers','customers.id','=','products.product_id')
            ->where('product_id',$id)
            ->delete();
      return redirect(route('dashboard'))->with('status','Deleted Successfully');
    }
}
