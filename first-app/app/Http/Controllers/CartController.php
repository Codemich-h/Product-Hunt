<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('cart.index')->with('viewData', $viewData);
    }

    public function add(Request $request, $id)
    {
        $products = $request->session()->get('product');
        $products[$id] = $request->input('quantity');
        $request->session()->put('product', $products);
        return redirect()->route('cart.index');
    }

    public function delete(Request $request)
    {
        $request->session()->forget('product');

        return back();
    }

    public function purchase(Request $request)
    {
        $total = 0;
        $productsInSession = $request->session()->get('product');
        // dd($productsInSession);
        if($productsInSession) {
            $userId = Auth::user()->getId();
            $order = new Order();
            $order = setUserId($userId);
            $order = setName(Auth::user()->getName());
            $order = setTotal(0);
            $order = save();
        }
        
        if(! $total) {
            $productsInCart = Product::findMany(array_keys($productsInSession));
            foreach ($productsInCart as $product) {
                $quantity = $productsInSession[$product->getId()];
                $item = new Item();
                $item->setQuantity($quantity);
                $item->setPrice($product->getPrice());
                $item->setProductId($product->getId());
                $item->setOrderId($order->getId());
                $item->save();
                $total += ($product->getPrice() * $quantity);
            }
            $order->setTotal($total);
            $order->save();
        }
    }
}
