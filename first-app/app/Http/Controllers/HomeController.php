<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;

class HomeController extends Controller
{
    //Home controller
    public function index() {
        $viewData = [
            'title' => 'Home: Shopping Made Easy',
            'description' => 'Online shop',
            'keywords' => 'home, page',
        ];
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
    
}
