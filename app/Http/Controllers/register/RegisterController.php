<?php

namespace App\Http\Controllers\register;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register()
    {
        return view('auth.register.register');
    }

    public function register_action(Request $request)
    {
        // return $request->all();
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'username' => 'required||unique:users',
            'address' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);
        $admin = new User();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->username = $request->username;
        $admin->address = $request->address;
        $admin->password = Hash::make($request->password);
        $admin->save();
        $isLogin = DB::table('logininfo')->first();

        if ($isLogin != null && $isLogin->isLogin == true) {
            return redirect()->back()->with('error', 'Sorry, you can not login right now');
        } else {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                if ($isLogin == null) {
                    DB::table('logininfo')->insert(['isLogin' => true]);
                } else {
                    DB::table('logininfo')->update(['isLogin' => true]);
                }
                return redirect()->route('user.researcher');
            } else {
                return redirect()->back()->with('error', 'Sorry, user registration failed');
            }
        }
    }
}
