@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
    <div class="row">
        <div class="flex items-center justify-center">
            <div class="w-full px-4 py-12 2xl:mx-auto 2xl:container sm:px-6 xl:px-20 2xl:px-0">

                <div class="flex flex-col items-center justify-center mb-4">
                    <h1 class="text-3xl font-semibold leading-7 text-gray-800 xl:text-4xl xl:leading-9 dark:text-white">
                        List of Products</h1>
                </div>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Id
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Product name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Descriptin
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Prict
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($viewData["products"] as $product)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $product->getId()}}
                                </th>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <a href="{{ route('view.product', ['id'=> $product->getId()]) }}">
                                        {{ $product->getProductName()}}
                                    </a>
                                </th>
                                <td class="px-6 py-4">
                                    {{ $product->getDescription()}}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $product->getPrice()}}
                                </td>
                                <td class="flex items-center px-6 py-4">
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                    <a href="#"
                                        class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Remove</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
