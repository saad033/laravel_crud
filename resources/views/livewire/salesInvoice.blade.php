<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Tailwind CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="public/css/style.css">

    <title>Sales Invoice</title>

</head>
<body>
<div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding">
    <div class="card">
        <div class="card-header p-4">
            <a class="pt-2 d-inline-block" href="index.html" data-abc="true"></a>
            <div class="float-right">
                <h3 class="mb-0">Invoice #BBB10234</h3>
                Date: 12 Jun,2019
            </div>
        </div>

        <form action="{{route('invoice_post')}}" method="POST">
            @csrf
            <div class="col-sm-6 ">
                    <h5 class="mb-3">Customer's Information:</h5>
                <select name="customer_name" class="text-dark mb-1" >
                    @foreach($customerInfo as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                    @endforeach
                </select>
                <div>
                    <select name="customer_name" class="text-dark mb-1" >
                        @foreach($customerInfo as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->address }}</option>
                        @endforeach
                    </select>
                </div>
                <div>Phone:
                    <select name="customer_name" class="text-dark mb-1" >
                        @foreach($customerInfo as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->phone_number }}</option>
                        @endforeach
                    </select>
                </div>

            </div>

    <div class="table-responsive-sm">
        <table class="table table-striped">
            <thead>
            <tr>
                <th class="center">#</th>
                <th>Item</th>
                <th>Description</th>
                <th class="right">Price</th>
                <th class="center">Qty</th>
                <th class="right">Total</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($saleInvoice as $row)
            <tr>

                <?php
                $subTotal=0;
                $tax = 0.2;
                $vat = 0;
                $afterVat = 0;
                ?>

{{--                @foreach(Cart::content() as $item)--}}
                    <?php
                       $total =  $row->sale_price*$row->quantity;
                       $subTotal += $total;
                       $vat = $tax * $subTotal;
                       $afterVat = $vat + $subTotal;
                    ?>
                <td class="center">{{$row->product_id}}</td>
                <td class="left strong">{{$row->product_name}}</td>
                <td class="left">{{$row->short_description}}</td>
                <td class="right">${{$row->sale_price}}</td>
                <td class="center">{{$row->quantity}}</td>
                <td class="right">{{$total}}</td>
{{--                    @endforeach--}}

            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-lg-4 col-sm-5">
        </div>
        <div class="col-lg-4 col-sm-5 ml-auto">
            <table class="table table-clear">
                <tbody>
                <tr>
                    <td class="left">
                        <strong class="text-dark">Subtotal</strong>
                    </td>
                    <td class="right">${{ $subTotal }}</td>
                </tr>
                <tr>
                    <td class="left">
                        <strong class="text-dark">Discount (20%)</strong>
                    </td>
                    <td class="right"></td>
                </tr>
                <tr>
                    <td class="left">
                        <strong class="text-dark">VAT (20%)</strong>
                    </td>
                    <td class="right">${{ $vat}}</td>
                </tr>
                <tr>
                    <td class="left">
                        <strong class="text-dark">Total</strong> </td>
                    <td class="right">
                        <strong class="text-dark">${{$afterVat}}</strong>
                    </td>
                </tr>
                </tbody>
            </table>
{{--            <a class="btn btn-success" href="{{route('invoice_post')}}" data-abc="true">--}}
                <button class="submit btn btn-success">Proceed</button>
        </div>
    </div>

<div class="card-footer bg-white">
    <p class="mb-0">BBBootstrap.com, Sounth Block, New delhi, 110034</p>
</div>



</form>
    </div>
</div>

<script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</script>
</body>
</html>
