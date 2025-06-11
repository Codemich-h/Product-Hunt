<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request) 
    {
        $total = 0;
        $productsInCart = [];
        $productInSection = $request->session()->get('product');
        if($productInSection) {
            $productsInCart = Product::findMany(array_keys($productInSection));
            $total = Product::sumPriceByQuantities($productsInCart, $productInSection);
        }
        $viewData = [];
        $viewData['title'] = 'Cart-Online Store';
        $viewData['subtitle'] = 'Shopping Cart';
        $viewData['total'] = $total;
        $viewData['product'] = $productsInCart;

        return view('cart.index')->with('viewData', $viewData);
    }

    public function add(Request $request, $id)
    {
        dd('test');
        $products = $request->session()->get('product');
        $products[$id] = $request->input('quantity');
        $test=$request->session()->put('product', $products);

        dd($test);
        // dd(session());
        
        return redirect()->route('cart.index');
    }
}
