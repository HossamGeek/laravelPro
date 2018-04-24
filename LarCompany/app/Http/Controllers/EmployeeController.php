<?php

namespace App\Http\Controllers;

use App\Employee;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }

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

            return redirect('/home');

  //      }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    return view('Add');


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$iduser,$idemployee)
    {

        $user =  User::find($iduser);
        $employees = Employee::find($idemployee);
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


        $employees->firstName = $request->firstname;
        $employees->lastName = $request->lastname;
        $employees->jobTitle = $request->job;

        if(empty($imagePath)){

        }else{
            $employees->image = $imagePath;

        }
        $employees->status = $request->status;
        $employees->lang = $request->location;
        $employees->lout = $request->location;



        $employees->save();

        return redirect('/home');



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update($idemployee)
    {

        $emp = Employee::find($idemployee);

                $arr = Array('employ'=>$emp);



        return view('update',$arr);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
