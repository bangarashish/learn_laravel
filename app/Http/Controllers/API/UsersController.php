<?php

namespace App\Http\Controllers\API;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class UsersController extends Controller
{
    public function getusers(){

        $url = 'https://reqres.in/api/unknown';

        // Make the HTTP GET request
        $response = Http::get($url);

        // Check if the request was successful
        if ($response->successful()) {
            // Return the response data as JSON
            return response()->json($response->json());
        } else {
            // Handle the error, return an appropriate response
            return response()->json([
                'error' => 'Unable to fetch data from external API'
            ], $response->status());
        }
    }

    public function store(Request $request)
    {
        //dd($request->all());
        // $validatedData = $request->validate([
        //     'title' => 'required|max:255',
        //     'content' => 'required',
        // ]);

        // Create a new Post instance with the validated data
        // $post = new User([
        //     'title' => $validatedData['title'],
        //     'content' => $validatedData['content'],
        // ]);

        $user = User::create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'company_name' => $request->company_name,
            'phone' => $request->phone,
            'expiry_date' => $request->expiry_date,
            'role' => $request->role,
            'email' => $request->email
        ]);


        // $post->save();

        return response()->json($user);
    }
}
