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
        <form  method="POST" action="{{ route('product_post') }}" enctype="multipart/form-data">
            @csrf
            <div class="md:flex">
                <div class="w-full">
                    <div class="p-4 border-b-2"> <span class="text-lg font-bold text-gray-600">Add documents</span> </div>
                    <div class="p-3">
                        <div class="mb-2"> <span class="text-sm">Add Products</span>
                            <input type="text" name="product_name"class="h-12 px-3 w-full border-gray-200 border rounded focus:outline-none focus:border-gray-300">
                        </div>
                        <div class="mb-2"> <span class="text-sm">Short Description</span>
                            <input type="text" name="short_description"class="h-12 px-3 w-full border-gray-200 border rounded focus:outline-none focus:border-gray-300">
                        </div>
                        <div class="mb-2"> <span class="text-sm">Sale Price</span>
                            <input type="text" name="sale_price" class="h-12 px-3 w-full border-gray-200 border rounded focus:outline-none focus:border-gray-300">
                        </div>
                        <div class="mb-2"> <span class="text-sm">Quantity</span>
                            <input type="number" name="quantity" class="h-12 px-3 w-full border-gray-200 border rounded focus:outline-none focus:border-gray-300">
                        </div>
                        <div class="mb-2"> <span>Attachments</span>
                            <div class="relative h-40 rounded-lg border-dashed border-2 border-gray-200 bg-white flex justify-center items-center hover:cursor-pointer">
                                <div class="absolute">
                                    <div class="flex flex-col items-center "> <i class="fa fa-cloud-upload fa-3x text-gray-200"></i> <span class="block text-gray-400 font-normal">Attach you files here</span> <span class="block text-gray-400 font-normal">or</span> <span class="block text-blue-400 font-normal">Browse files</span> </div>
                                </div> <input type="file" name="file"class="h-full w-full opacity-0" required>
                            </div>
                            <div class="flex justify-between items-center text-gray-400"> <span>Accepted file type:.doc only</span> <span class="flex items-center "><i class="fa fa-lock mr-1"></i> secure</span> </div>
                        </div>

                        <div>

                            <select name="customer_id" class="h-12 px-3 w-full border-gray-200 border rounded focus:outline-none focus:border-gray-300">
                                @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->id }}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="mt-3 text-center pb-3"> <button class="w-full h-12 text-lg w-32 bg-blue-600 rounded text-white hover:bg-blue-700">Add Product</button> </div>
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
