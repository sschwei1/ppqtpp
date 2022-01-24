<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    public function loginPage()
    {
        if(!is_null(Session::get('user_id'))) {
            return Redirect::route('view.presentation.overview');
        }

        return view('users.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $data = $request->input();

        $user = User::where('username', $data['username'])
            ->where('password', $data['password'])
            ->first();

        if(isset($user)) {
            Session::regenerate();
            Session::put('user_id', $user['id']);

            return Redirect::route('view.presentation.overview');
        }

        return Redirect::route('view.user.login');
    }

    public function logout(Request $request)
    {
        Session::flush();
        return Redirect::route('view.user.login');
    }
}
