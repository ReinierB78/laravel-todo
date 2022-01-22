<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    function index() {
        return view('welcome', ['side' => 'front']);
    }
}
