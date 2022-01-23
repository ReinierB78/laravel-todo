<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Redirect,Response;
use DB;


class UserController extends Controller
{
    public function index() {
        $ooUsers = User::all();
        return view('users.index', ['ooUsers' => $ooUsers]);
    }

    public function create() {
        return view('users.create');
    }

    public function store(Request $request){
        $oUser = new User();
        $oUser->name = $request->input('name');
        $oUser->email = $request->input('email');
        $oUser->password = Hash::make($request->input('password'), ['rounds' => 12]);

        if($oUser->save()) {
            // done
            return redirect()->route('welcome')->withMessage('User added...');
        } else {
            // error
            return redirect()->back();
        }
    }
}
