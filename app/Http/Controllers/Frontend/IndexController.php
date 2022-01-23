<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    function index() {
        $loggedIn = Auth::user() ? true : false;
        if($loggedIn) {
            return view('dashboard.index', ['oUser' => Auth::user()]);
        } else {
            return view('frontpage', ['loggedIn' => $loggedIn]);
        }
    }
}
