<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;

class HomeController extends Controller
{
    //Home controller
    public function index() {
        $viewData = [
            'title' => 'Hmee: Shopping Made Easy',
            'description' => 'Online shop',
            'keywords' => 'home, page',
        ];
        return view('home.index', $viewData)->with('viewData', $viewData);
    }
}
