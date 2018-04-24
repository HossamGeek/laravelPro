@extends('layouts.app')

@section('content')
<div class="container">

    <form  action="/Add" method="post" class="Add-Form" style="margin-left: 40%" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="text" placeholder="userName" class="form-control col-sm-5" name="user" required="required">
        <input type="text" placeholder="firstName" class="form-control col-sm-5" required="required" name="firstname">
        <input type="text" placeholder="lastName" class="form-control col-sm-5" required="required" name="lastname">
        <input type="email" placeholder="Email" class="form-control col-sm-5" required="required" name="email">
        <input type="password" placeholder="Password" class="form-control col-sm-5" required="required" name="password">
        <input type="text" placeholder="Job Title" class="form-control col-sm-5" required="required" name="job">
            Add Image
        <input type="file" name="photo" >
        <input type="text" id="mapLable" placeholder="location" class="form-control col-sm-5" name="location">
        <input type="button" value="Display Location" onclick="getmyposition();" class="btn btn-outline-success"  />
        <div id="map" style="border: 1px solid slategray;margin-bottom:10px; width:300px;
            height:300px;">

        </div>

        <select name="status" class="form-control col-sm-5" >
            <option value="1">Active</option>
            <option value="0">DisActive</option>
        </select>

        <input type="submit" value="Add" class="btn btn-success">

    </form>


</div>
@endsection
