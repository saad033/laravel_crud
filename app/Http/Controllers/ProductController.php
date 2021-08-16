<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return view ('livewire.products');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){
        $customers = DB::table('customers')->get();
           $product = DB::table('products')->get();

        return view('livewire.products',compact('customers'));




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
//        dd($request->all());
        $request->validate([
            'product_name'=>'required',
            'short_description'=>'required',
            'sale_price'=>'required',
            'quantity'=>'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);

        $product = new Product();
        $product->product_name = $request->product_name;
        $product->short_description = $request->short_description;
        $product->sale_price = $request->sale_price;

        $product->quantity = $request->quantity;

            /* File Loaded and Moved into the folder uploads/images */
        if($request->file()) {
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('/uploads/images', $fileName, 'public');
            $request->file->move(public_path('images'), $fileName);

            $product->images = $filePath;


            $product->product_id = $request->customer_id;
            $product->save();
            return redirect(route('dashboard'))->with('status', 'Record Added');
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

        return view('livewire.edit',['data'=>$data]);
        $data = DB::table('products')
            ->join('customers','customers.id','=','products.product_id')
            ->where('product_id',$id)
            ->get();
        dd($data);
        return view('livewire.edit',['data'=>$data]);

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
//          dd($request->all());
        $product = Product::find($id);

        $product = new Product();
//        dd($product);
        $product->product_name = $request->product_name;
        $product->short_description =$request->short_description;
        $product->sale_price = $request->sale_price;
        $product->quantity = $request->quantity;
//        $product->product_id = $request->id;
        $product->save($request->all());

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
    }
}
