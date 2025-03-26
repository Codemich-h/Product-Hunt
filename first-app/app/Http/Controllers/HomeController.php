<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;

class HomeController extends Controller
{
    //Home controller
    public function __invoke() {
        return view('auth.login');

    }
}
