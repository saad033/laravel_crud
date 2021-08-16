<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Tailwind CSS -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">


    <title>Add Products</title>

</head>
<body>
<div class="bg-green-200 py-32 px-10 min-h-screen ">
    <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden md:max-w-lg">
        <form  method="POST" action="" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="md:flex">
                <div class="w-full">
                    <div class="p-4 border-b-2"> <span class="text-lg font-bold text-gray-600">Add documents</span> </div>
                    <div class="p-3">
                        <div class="mb-2"> <span class="text-sm">Add Products</span>
                            @foreach($data as $row)
                                <input type="hidden" name="id" value="{{$row->id}}"class="h-12 px-3 w-full border-gray-200 border rounded focus:outline-none focus:border-gray-300">
                            <input type="text" name="product_name" value="{{$row->product_name}}"class="h-12 px-3 w-full border-gray-200 border rounded focus:outline-none focus:border-gray-300">
                        </div>
                        <div class="mb-2"> <span class="text-sm">Short Description</span>
                            <input type="text" name="short_description" value="{{$row->short_description}}"class="h-12 px-3 w-full border-gray-200 border rounded focus:outline-none focus:border-gray-300">
                        </div>
                        <div class="mb-2"> <span class="text-sm">Sale Price</span>
                            <input type="text" name="sale_price" value="{{$row->sale_price}}" class="h-12 px-3 w-full border-gray-200 border rounded focus:outline-none focus:border-gray-300">
                        </div>
                        <div class="mb-2"> <span class="text-sm">Quantity</span>
                            <input type="number" name="quantity" value="{{$row->quantity}}"class="h-12 px-3 w-full border-gray-200 border rounded focus:outline-none focus:border-gray-300">
                        </div>

                        <div>


                        </div>
            @endforeach
                        <div class="mt-3 text-center pb-3"> <button class="w-full h-12 text-lg w-32 bg-blue-600 rounded text-white hover:bg-blue-700">Edit Products</button> </div>
                    </div>
                </div>
            </div>
        </form>
        @if (session()->has('status'))
            <div class="mt-5 shadow bg-purple-500 text-white font-bold py-2 px-4 rounded">
                {{session('status')}}
                @endif
            </div>
    </div>
</div>

</body>
</html>
