<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use App\Models\Product;

class HomeController extends Controller
{
    //Home controller
    public function index() {
        $viewData = [];
        $viewData['title'] = 'Home: Shopping Made Easy';
        $viewData['description'] = 'Online shop';
        $viewData['products'] = Product::all();

        // dd(Product::all());
        return view('home.index', $viewData)->with('viewData', $viewData);
    }

    public function about() {
        $viewData['name'] = 'Michell H. Topah';
        $viewData['title'] = 'About Online Shop';
        $viewData['subtitle'] = 'About page';
        $viewData['description'] = 'This is the Shop about page';
        $viewData['dev'] = 'Developed by '.'👊🏾'.$viewData['name'];

        return view('home.about')->with('viewData',$viewData);
    } 

    public function contact()
    {
        $viewData['email'] = 'michellbastos@store';
        $viewData['address'] = 'Monrovia, Liberia';
        $viewData['phone'] = '+231777454545';

        return view('home.contact')->with('viewData', $viewData);
    }
    
}
