<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
// use DataTables;
use Yajra\DataTables\Facades\Datatables;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function index(Request $request){

        // $users = User::all();
        // return view('admin.users.index', compact('users'));

        // ------------   one to one relation ----------------

         //return User::with('profile')->findOrFail(24);

         //$user = User::with('profile')->findOrFail(24);

         // Format the user data as a JSON string with pretty print
         //return json_encode($user->toArray(), JSON_PRETTY_PRINT);

         // ------------  one to one relation ------------------


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

       // dd($request->all());

        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users',
        //     'phone' => 'required|min:5',
        // ]);

    //    --------------- Store Data With Relation ---------------

        // $user = App\Models\User::create([
        //     'name' => 'John Doe',
        //     'email' => 'john.doe@example.com',
        // ]);

        // $profile = new App\Models\Profile([
        //     'phone_number' => '123-456-7890',
        // ]);

        // $user->profile()->save($profile);

    //    --------------- Store Data With Relation -----------------


        // $user = User::create([
        //     'name' => $request->name,
        //     'password' => Hash::make($request->password),
        //     'company_name' => $request->company_name,
        //     'phone' => $request->phone,
        //     'expiry_date' => $request->expiry_date,
        //     'roless' => $request->role,
        //     'email' => $request->email
        // ]);

        // return response([
        //     'status' => 'ok',
        //     'success' => false,
        //     'message' => 'Insert record'
        // ]);


        $rules = [
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'company_name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'expiry_date' => 'required|date',
            'role' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email'
        ];

        // Validate the request data
        $validatedData = $request->validate($rules);

        // Create the user
        $user = User::create([
            'name' => $validatedData['name'],
            'password' => Hash::make($validatedData['password']),
            'company_name' => $validatedData['company_name'],
            'phone' => $validatedData['phone'],
            'expiry_date' => $validatedData['expiry_date'],
            'roless' => $validatedData['role'],
            'email' => $validatedData['email']
        ]);

        // Return a response or redirect
        return response()->json(['user' => $user], 201);

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
