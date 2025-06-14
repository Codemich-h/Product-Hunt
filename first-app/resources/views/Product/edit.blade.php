@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div
                class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Edit Product
                    </h1>
                    <form method="POST" action="{{ route('update.product', ['id'=> $viewData['product']->getId()]) }}" class="space-y-4 md:space-y-6" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="text"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Name</label>
                            <input type="text" value="{{ $viewData['product']->getProductName()}}" name="product_name" id="product_name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Phone" required="">

                            {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
                            @if ($errors->has('product_name'))
                                <div class="text-red-600/100">
                                    {{ $errors->first('product_name') }}
                                </div>
                            @endif
                        </div>
                        <div>
                            <label for="message"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                            <textarea type="message" name="description" id="description" placeholder="message"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required="" rows="3">{{ $viewData['product']->getDescription()}}</textarea>

                            {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
                            @if ($errors->has('description'))
                                <div class="text-red-600/100">
                                    {{ $errors->first('description') }}
                                </div>
                            @endif
                        </div>
                        <div>
                            <label for="file_input"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload file</label>
                            <input
                                class="block w-full size-10 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                id="image"  name="image" type="file"> {{ $viewData['product']->getImage()}}

                            {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
                            @if ($errors->has('image'))
                                <div class="text-red-600/100">
                                    {{ $errors->first('image') }}
                                </div>
                            @endif
                        </div>
                        <div>
                            <label for="number"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                            <input type="number" value="{{ $viewData['product']->getPrice()}}" name="price" id="price" placeholder="0.00"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required="">

                            {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
                            @if ($errors->has('price'))
                                <div class="text-red-600/100">
                                    {{ $errors->first('price') }}
                                </div>
                            @endif
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-blue-800 hover:bg-blue-600 cursor-pointer focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
