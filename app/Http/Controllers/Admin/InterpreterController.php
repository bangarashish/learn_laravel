<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InterpreterController extends Controller
{
    public function index(){

        return view('admin.interpreter.index');

    }

    public function create(){
        return view('admin.interpreter.addInterpreter');
    }

    public function store(Request $request){

        dd($request->all());
    }
}
