<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    function apresenta(){
    	return view('index');
    }

}
