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

    public function show($id) {
        $oUser = User::find($id);
        return view('users.show', [
            'oUser' => $oUser,
            'type' => 'show',
        ]);
    }

    public function edit($id) {
        $oUser = User::find($id);
        $encryptTest = 'not encrypted password: ' . $oUser->password;
        $encrypted = false;
        if (Hash::check($oUser->password, $oUser->password)) {
            // The passwords match...
            $encryptTest = 'password is encrypted';
            $encrypted = true;
        }

        $ooRoles = Role::all();
        $ooUserEmployees = UserEmployee::all();

        return view('users.edit', [
            'oUser' => $oUser,
            'type' => 'edit',
            'encrypted' => $encrypted,
            'ooRoles' => $ooRoles,
            'ooUserEmployees' => $ooUserEmployees
        ]);
    }
    public function update(Request $request, $id) {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role
        ];

        if (Hash::check($data['password'], $data['password']) == false) {
            $data['password'] = Hash::make($request->password, [
                'rounds' => 12,
            ]);
        }
        if(User::where('id', $id)->update($data)) {
            return redirect()->route('users.show', $id)->withMessage('User updated...');
        } else {
            return redirect()->route('users.index')->withMessage('Som Tin Wong...');
        }
    }
    public function create() {
        $ooRoles = Role::all();

        return view('users.create', [
            'ooRoles' => $ooRoles
        ]);
    }

    public function store(Request $request){
        $oUser = new User();
        $oUser->name = $request->input('name');
        $oUser->email = $request->input('email');
        $oUser->password = Hash::make($request->input('password'), ['rounds' => 12]);

        if($oUser->save()) {
            // done
            return redirect()->route('users.index')->withMessage('User added...');
        } else {
            // error
            return redirect()->back();
        }
    }

    public function destroy($id) {

        $user = User::findOrFail($id);

        if($user->delete()) {
            // done
            return redirect()->route('users.index')->withMessage('User deleted...');
        } else {
            // error
            return redirect()->back();
        }
    }
    public function usersAjax(Request $request)
    {
        if(isset($request->user_sort)) {

            switch($request->user_sort) {
                case 'id-asc':
                    $ooUsers = User::all()->sortBy('id');
                    break;
                case 'id-desc':
                    $ooUsers = User::all()->sortByDesc('id');
                    break;
                case 'name-asc':
                    $ooUsers = User::all()->sortBy('name');
                    break;
                case 'name-desc':
                    $ooUsers = User::all()->sortByDesc('name');
                    break;
                default:
                    $ooUsers = User::all();
            }
        } else {
            $ooUsers = User::all();
        }

        $view = view('users._result', ['ooUsers' => $ooUsers, 'request' => $request])->render();

        return response()->json(['view' => $view]);
    }
}
