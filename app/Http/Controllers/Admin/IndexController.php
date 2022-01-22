<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    function index() {
        return view('welcome', ['side' => 'admin']);
    }
}
