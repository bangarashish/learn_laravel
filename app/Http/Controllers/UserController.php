<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
// use DataTables;
use Yajra\DataTables\Facades\Datatables;
class UserController extends Controller
{
    public function index(Request $request){

        // $users = User::all();
        // return view('admin.users.index', compact('users'));


        if ($request->ajax()) {
  
            //$data = Product::latest()->get();
            $data = User::all();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                        //    $btn = '<a href="{{route('edit-user')}}/.'$row->id'." data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';
                           $btn = '<a href="' . route('edit-user', ['id' => $row->id]) . '" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';

                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        // return view('productAjax');
        return view('admin.users.index');




    }
   

    public function addUser(){
        return view('admin.users.addUser');
    }

    public function store_user(Request $request){

        // print_r($request->all());

        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users',
        //     'phone' => 'required|min:5',
        // ]);
        

        $user = User::create([
            'name' => $request->name,
            'password' => bcrypt($request->password),
            'company_name' => $request->company_name,
            'phone' => $request->phone,
            'expiry_date' => $request->expiry_date,
            'role' => $request->role,
            'email' => $request->email
        ]);

        return response([
            'status' => 'ok',
            'success' => false,
            'message' => 'Insert record'
        ]);

    }

    public function edit_user($id){

        $user = User::findOrFail($id);
        // Return a view or JSON response
        return view('admin.users.editUser', compact('user'));

    }

    public function update_user(Request $request){

        // dd($request->all());
        
        $user = User::find($request->userId);

        if ($user) {
            // Update the user's attributes
            $user->update([
                'name' => $request->name, 
                'email' => $request->email,
                'company_name' => $request->company_name,
                'phone' => $request->phone,
                'expiry_date' => $request->expiry_date,
                'role' => $request->role,
            ]);
        
            return response()->json(['message' => 'User updated successfully']);
        }

    }

    
}
