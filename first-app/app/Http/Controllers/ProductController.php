<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function show()
    {
        $viewData = [];
        $viewData['title'] = 'Home: Shopping Made Easy';
        $viewData['description'] = 'Online shop';
        $viewData['products'] = Product::all();
        $viewData['products'] = Product::orderBy('id', 'desc')->paginate(4);

        // dd(Product::all());
        return view('product.product', $viewData)->with('viewData', $viewData);
    }

    public function view($id)
    {
        $viewData = [];
        $product = Product::find($id);
        $viewData['title'] = $product->getProductName().'-Shop';
        $viewData['subtitle'] = $product->getProductName().'-Online Store product information  ';
        $viewData['products'] = $product;

        return view('product.viewProduct', $viewData)->with('viewData', $viewData);
    }

    public function add()
    {
        return view('layouts.addProduct');
    }

    public static function store(Request $request)
    {
        // $request->validate([
        //     'product_name' => 'required|string|max:255',
        //     'description' => 'required|min:15',
        //     'image' => 'required|image',
        //     'price' => 'required|numeric|min:2',
        // ]);
        // Product::validate($request);


        $newProduct = new Product();
        $newProduct->setProductName($request->input('product_name'));
        $newProduct->setDescription($request->input('description'));
        $newProduct->setImage($request->input('image'));
        $newProduct->setPrice($request->input('price'));
        $newProduct->save();
        // dd('test');

        if($request->hasFile('image')) {
            $imageName = $newProduct->getId().'.'.$request->file('image')->getClientOriginalExtension();
            Storage::disk('public')->put($imageName, file_get_contents($request->file('image')->getRealPath()));
            $newProduct->setImage($imageName);
            $newProduct->update();

        }
        return back()->with('Successfully');
    }

    public function edit($id)
    {
        $viewData = [];
        $viewData['title'] = 'Product Online Store';
        $viewData['subtitle'] = 'Edit product';
        $viewData['product'] = Product::findOrFail($id);

        return view('product.edit')->with('viewData', $viewData);
    }

    public function update(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'description' => 'required|min:15',
            'image' => 'required|image',
            'price' => 'required|numeric|min:2',
        ]);


    }
}
