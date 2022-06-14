<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login.login');
    }

    public function login_action(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $isLogin = DB::table('logininfo')->first();

        if ($isLogin != null && $isLogin->isLogin == true) {
            // dd("true");
            return redirect()->back()->with('error', 'Sorry, you can not login right now');
        } else {
            // dd("false");
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                if ($isLogin == null) {
                    DB::table('logininfo')->insert(['isLogin' => true]);
                } else {
                    DB::table('logininfo')->update(['isLogin' => true]);
                }
                return redirect()->route('user.researcher');
            } else {
                return redirect()->back()->with('error', 'Login credentials incorrect');
            }
        }
    }
}
