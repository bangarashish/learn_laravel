<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\InterpreterModel;
use Yajra\DataTables\Facades\Datatables;

class InterpreterController extends Controller
{
    public function index(Request $request){

            if($request->ajax()){

                $interpreters = DB::table('interpreters')
                ->leftJoin('cities','interpreters.city_id','=','cities.id')
                ->leftJoin('states','interpreters.state_id', '=', 'states.id')
                ->leftJoin('countries','interpreters.country_id','=','countries.id')
                ->select('interpreters.*', 'cities.city_name', 'states.state_name', 'countries.country_name')
                ->get(); 
           
                // return response()->json($interpreters);
                // $data['property'] = $interpreters;
                return Datatables::of($interpreters)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                       
                           $btn = '<a href="' . route('interpreter.show', ['interpreter' => $row->id]) . '" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';

                           $btn = $btn.' <a href="'. route('interpreter.destroy', ['interpreter' => $row->id]).'" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }

           
        return view('admin.interpreter.index');

    }

    public function create(){

        $cities    = DB::table('cities')->get();
        $states    = DB::table('states')->get();
        $countries = DB::table('countries')->get();

        $data = [
            'cities' => $cities,
            'states' => $states,
            'countries' => $countries
        ];

        return view('admin.interpreter.addInterpreter', compact('data'));
    }

    public function store(Request $request){

        //dd($request->all());

        $subjects = $request->subject;
        if (!is_array($subjects)) {
            $subjects = [];
        }
        
        $subject = implode(',', $subjects);

       $interpreter = InterpreterModel::create([
            'name'       => $request->name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'city_id'    => $request->city,
            'state_id'   => $request->state,
            'country_id' => $request->country,
            'dob'        => $request->dob,
            'gender'     => $request->gender,
            'subject'    => $subject,
            'description' => $request->description,

       ]);
    }

    public function show($id){

        $interpreter = InterpreterModel::findorfail($id);

        $interpreter->subject = is_array($interpreter->subject) ? $interpreter->subject : explode(',', $interpreter->subject ?? '');    
        
        $cities    = DB::table('cities')->get();
        $states    = DB::table('states')->get();
        $countries = DB::table('countries')->get();

        $data = [
            'interpreter' => $interpreter,
            'cities' => $cities,
            'states' => $states,
            'countries' => $countries
        ];
       
        
        return view('admin.interpreter.editInterpreter', compact('data'));
    }
}
