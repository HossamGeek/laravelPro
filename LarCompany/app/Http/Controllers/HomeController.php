<?php

namespace App\Http\Controllers;

use App\Employee;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('home');
    }


    public function show(){
        $user = Auth::user();

        $Employee = Employee::all();

        $Users= User::all();

        if($user->Admin == 1){

             $arr = Array('users'=>$Users,'employees'=>$Employee);

            return view('admin',$arr);
        }else{
           $iduser =$user->id;
            $FEmployee = Employee::where('user_id', '=', $iduser)->first();


            if($FEmployee->status == 0){

                return redirect('/logout');

            }else{
                return view('home');

            }


        }

    }


    public function destroy($iduser,$idemployee)
    {
        $user = User::find($iduser);

        $emp = Employee::find($idemployee);

        $user->delete();
        $emp->delete();
        return back();

    }




    public function makeAdmin($id){
        $user = User::find($id);
        $user->Admin = 1;
        $user->save();
        return back();

    }
    public function active($id){
        $user = Employee::find($id);
        $user->status = 0;
        $user->save();
        return back();

    }

    public function disactive($id){
        $user = Employee::find($id);
        $user->status = 1;
        $user->save();
        return back();

    }


    public  function  getdata($id){
        $user= Employee::find($id)->toArray();
           return response()->json($user);
    }



}
