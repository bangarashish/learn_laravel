<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
class AdminController extends Controller
{
    public function index()
    {
        return view('admin.login');

        // if (Auth::guard('admin')->check()) {
        //     return redirect(route('admin.dashboard'));
        // } else {
        //     return view('admin.login');
        // }

    }

    public function login(Request $request)
    {
       
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
      
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
           // dd(Auth::id());
            return redirect()->intended(route('dashboard'))
                        ->withSuccess('You have Successfully loggedin');
        }else{
           return redirect('/admin');
        }

    }

    public function logout(Request $request)
    {
        // Auth::guard('admin')->logout();
        // $request->session()->invalidate();
        // return redirect('/admin');

        Session::flush();
        Auth::logout();
        return Redirect('/admin');
    }
}
