<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function viewDashboard(){

        return view('admin.dashboard');
    }

    public function adminDashboard(){
        return view('admin.dash');
    }
}
