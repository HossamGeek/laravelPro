<?php

namespace App\Http\Controllers;

use App\Employee;
use App\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
class Emp extends Controller
{
    //

    public function Add(Request $request )
    {
        $user = new User;
        $employees = new Employee;
        $imagePath = "";
        if($request->hasfile('photo')){
            $imagePath = $request->file('photo')->store('public');
        }

        /*        if(
                    )){

                    $error =array("err"=>"please input not be empty") ;
                    return view('/addpost',$error);
                }else{*/
        $user->name = $request->user;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();


        $lastuser =  User::latest()->first();
        $employees->firstName = $request->firstname;
        $employees->lastName = $request->lastname;
        $employees->jobTitle = $request->job;
        $employees->image = $imagePath;
        $employees->status = $request->status;
        $employees->lang = $request->location;
        $employees->lout = $request->location;

        $employees->user_id = $lastuser->id;
        //           $user->password = $imagePath;

        $employees->save();

        return response()->json($user);

        //      }

    }


    public function getAll(){
        $user= Employee::all()->toArray();
        return response()->json($user);
    }

    public function index($id){
        $user= Employee::find($id)->toArray();
        return response()->json($user);
    }

  /*  public function search(){
        $user= Employee::all()->toArray();
//response()->json($user);
        return $user;
    }*/

    public function search(Request $request) {

//       $data = $request->get('data');

    $name =$request->firstname;

        $search_emps = Employee::where('firstName', 'like', "%{$name}%")
            ->get();

  //          print_r($name);

        $arr = Array('employ'=>$search_emps);

        return view('list',$arr);
            /*   return response()->json([
            'name' => $search_drivers
        ]);*/
    }
}
