@extends('layouts.app')

@section('content')
<div class="container">
            <h1 class="text-center" style="margin-bottom:25px ">Hello Admin Page</h1>
            <form action="http://127.0.0.1:8000/api/empname" method="get">
                <input type="text" name="firstname" class="form-control offset-3 col-sm-6" style="margin-bottom: 10px">

                <input type="submit" class="btn btn-success offset-7 col-sm-2" value="search" style="
                margin-bottom: 15px;">

            </form>

            <div class="table-responsive text-center table-light">
                <table class="main-table table table-bordered " >
                    <tr style="background-color:slategray ;
    color: white;
    text-align: center;">
                        <td>#First Name</td>
                        <td>#Last Name</td>
                        <td>#Username</td>
                        <td>#Mail</td>
                        <td>#Job Title</td>
                        <td>#Image</td>
                        <td>other</td>
                    </tr>


                        @foreach($employees as $employee)
                        @if($employee->user->Admin == 0)

                        <tr>

                                <td>{{$employee->firstName}}</td>
                                <td>{{$employee->lastName}}</td>
                                <td>{{$employee->user->name}}</td>
                                <td>{{$employee->user->email}}</td>
                                <td>{{$employee->jobTitle}}</td>
                                <td><img src ="{{ Storage::url($employee->image)}}" width="100" height="100"/></td>
                                <td>
                                    <a href="/Delete/{{$employee->user->id}}/{{$employee->id}}"
                                       class="btn btn-danger" style="margin-left:5px ;margin-bottom: 7px">
                                        <i class="fa fa-trash" style="margin-right: 3px   "></i>Delete</a>
                                    <a href="/update/{{$employee->id}}"
                                       class="btn btn-success" style="margin-left:5px ;margin-bottom: 7px">
                                        <i class="fa fa-edit" style="margin-right: 3px" ></i>Update</a>
                                    @if($employee->user->Admin != 1)
                                    <a href='/makeAdmin/{{$employee->user->id}}' class='btn  btn-primary'
                                       style=" background-color: #ff8899;border: 1px solid  #ff8899;margin-left:5px ;margin-bottom: 7px  ">
                                        <i class="fa fa-check" style="
                                        margin-right: 3px;"></i>Make Admin</a>
                                    @endif
                                    @if($employee->status == 0)

                                        <a href="/disactive/{{$employee->id}}"
                                           style="margin-left:5px ;margin-bottom: 7px"
                                           class="btn Disactive btn-primary "><i class="fa fa-ban"
                                                                                 style="margin-left:5px "></i>

                                            DisActive</a>

                                    @else
                                        <a href='/active/{{$employee->id}}' class='btn  btn-primary'
                                           style="margin-left:5px ;margin-bottom: 7px"> <i class="fa fa-check"
                                        style="margin-right: 3px"></i>Active</a>

                                    @endif
                                    <a href="http://127.0.0.1:8000/api/emp/{{$employee->id}}"
                                       class="btn btn-success" style="
                                       margin-left:5px ;margin-bottom: 7px;background-color: #ff937d;border: 1px solid #ff8899">
                                        <i class="fa fa-send" style="margin-right: 3px" ></i>Get Data</a>
                                </td>

                            @endif
                        </tr>
                        @endforeach

                </table>
            </div>

            <a href="/Add"
               class="btn btn-success col-sm-1">
                <i class="fa fa-plus" style="margin-right: 3px"></i>Add</a>


</div>
@endsection
