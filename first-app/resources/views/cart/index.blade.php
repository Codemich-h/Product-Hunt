@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
<div class="relative overflow-x-auto card text-center">
    <div class="cart-header mt-10 mb-10 text-gray-700">Products in Cart</div>
        <table class="w-full text-sm rtl:text-right text-gray-700 dark:text-gray-700 table text-center table-bordered table-striped">
            <thead class="">
                <tr class="table-auto">
                    <th scope="col">ID</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                </tr>
            </thead>
            <tbody>
                @foreach($viewData["product"] as $product)
                <tr>{{ $product->getId()}}</tr>
                <tr>{{ $product->getProductName()}}</tr>
                <tr>{{ $product->getPrice()}}</tr>
                <tr>{{ $product->getId()}}</tr>
                <td>{{ session('product')[$product->getId()] }}</td>
                @endforeach
            </tbody>
        </table>
</div>
@endsection
