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
        $productInSession = $request->session()->get('product');
        if($productInSession) {
            $productsInCart = Product::findMany(array_keys($productInSession));
          $total = Product::sumPricesByQuantities($productsInCart, $productInSession);
        }
        
        $viewData = [];
        $viewData['title'] = 'Cart-Online Store';
        $viewData['subtitle'] = 'Shopping Cart';
        $viewData['total'] = $total;
        $viewData['product'] = $productsInCart;
 
        // dd($viewData);
        return view('cart.index')->with('viewData', $viewData);
    }

    public function add(Request $request, $id)
    {
        // dd('test');
        $products = $request->session()->get('product');
        $products[$id] = $request->input('quantity');
        $request->session()->put('product', $products);
        // dd($products);
        return redirect()->route('cart.index');
    }
    // public function add(Request $request, $id)
    // {
    //     $products = $request->session()->get('product');
    //     $products[$id] = $request->input('quantity');
    //     $request->session()->put('products', $products);

    //     return redirect()->route('cart.index');
    // }
}
