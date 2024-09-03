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



        if (Auth::guard('admin')->attempt($credentials)) {

            $role = Auth::guard('admin')->user()->role;

            if($role == 'admin'){
                  return redirect(route('dash'));
            }elseif($role == 'customer'){
                    //Auth::guard('admin')->logout();
                  return redirect(route('dashboard'));
            }


            // return redirect(route('admin.dashboard'));
        } else {
            return back()->with('error', 'The provided credentials do not match our records.')->withInput();
        }




        // if (Auth::attempt($credentials)) {
        //    // dd(Auth::id());
        //     return redirect()->intended(route('dashboard'))
        //                 ->withSuccess('You have Successfully loggedin');
        // }else{
        //    return redirect('/admin');
        // }

    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        return redirect('/admin');

        // Session::flush();
        // Auth::logout();
        // return Redirect('/admin');
    }
}
