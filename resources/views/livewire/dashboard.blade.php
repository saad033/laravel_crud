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
        <div class="py-2">
        @if (session()->has('status'))
        <div class="mb-5 bg-purple-500 text-white text-sm font-bold py-2 px-4">
        {{session('status')}}
        </div>

        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
        <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-gray-800">
        <!-- This example requires Tailwind css v2.0 -->
        <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-400">
        <thead class="bg-gray-700">
        <tr>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-100 uppercase
        tracking-wider">
       Customer Name
        </th>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-100 uppercase
        tracking-wider">
        Product Name
        </th>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-100 uppercase
        tracking-wider">
        Quantity
        </th>

        <th scope="col" class="px-20 py-3 text-left text-xs font-medium text-gray-100 uppercase
        tracking-wider">
        Actions
        </th>
        </tr>
        </thead>
        <tbody class="bg-gray-600 text-white divide-y divide-gray-500">
        @foreach($data as $row)

        <tr>
        <td class="px-6 py-4 whitespace-nowrap">
         {{$row->name}}
        </td>
{{--        <td class="px-6 py-4 whitespace-nowrap">{{$post->title}}--}}
        </td>
        <td class="px-6 py-4 whitespace-nowrap">
            {{$row->product_name}}

        </td>
            <td class="px-6 py-4 whitespace-nowrap">
                {{$row->quantity}}

            </td>
        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
{{--        <a href="{{url('product_form/edit',$row->id)}}" class="bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none--}}
{{--        text-white text-sm py-1 px-2 rounded">Edit Products</a>--}}
            <a href="{{url('customer/edit',$row->id)}}" class="bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none
        text-white text-sm py-1 px-2 rounded">Edit</a>
        <a href="{{url('customer/delete',$row->id)}}" class="bg-red-500 hover:bg-red-400 focus:shadow-outline focus:outline-none
        text-white text-sm py-1 px-2 rounded ml-5">Delete</a>
            <a href="{{url('invoice/print',$row->id)}}" class="bg-red-500 hover:bg-red-400 focus:shadow-outline focus:outline-none
        text-white text-sm py-1 px-2 rounded ml-5">Sales Invoice</a>
        </td>
        </tr>
        @endforeach
{{--        @endforeach--}}
        </tbody>
        </table>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>

        </div>
        </div>
        </div>
        </div>

</body>
</html>
