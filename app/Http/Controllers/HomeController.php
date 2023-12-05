<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function aboutus(){
        if (false) {
            return redirect()->route('veera');
        }
        return '<h1>You are not authorized</h1>';
    }
}
