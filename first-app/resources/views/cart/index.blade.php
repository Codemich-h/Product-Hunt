@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
      
<div class="relative overflow-x-auto text-center">
    <div class="cart-header mt-10 mb-10 text-black font-bold font-stretch-expanded">Products in Cart</div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Product Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
                <th scope="col" class="px-6 py-3">
                    Quantity
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($viewData['product'] as $product)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $product->getId() }}
                </th>
                <td class="px-6 py-4">
                    {{ $product->getProductName()}}
                </td>
                <td class="px-6 py-4">
                    $ {{ $product->getPrice()}}
                </td>
                <td class="px-6 py-4">
                    {{ session('product')[$product->getId()] }}
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
    <div class="row">
        <div class="text-end mr-60 mt-12">
            <a class="mb-2 btn btn-outline-secondary"><b>Total to pay: </b>${{ $viewData["total"]}}</a>
            @if(count($viewData['product'])>0)
            <a href="{{ route('cart.purchase')}}" class="mb-2 text-black btn bg-primary">
                <button type="submit" class="ml-20 py-2 px-3 text-sm font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-900">Buy Now</button>
            </a>
            <a href="{{ route('cart.delete')}}">
                <button type="submit" class="ml-20 py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">Remove all products from cart</button>
            </a>
            @endif
        </div>
    </div>
</div>

</div>
@endsection
