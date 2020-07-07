@extends('layouts.app')
@section('title') Employee Create @endsection 
@section('headone') Employee Create @endsection 
@section('headtwo') Library @endsection 
@section('content')
<div class="row">
	
<div class="col-md-2">
	<a href="{{route('employee.index')}}">
    <button type="button" class="btn btn-primary">Go Back</button>
    </a> 
</div>
<div class="col-md-8 center">
	
<div class="card">
                            <form class="form-horizontal">
                                <div class="card-body">
                                    <h4 class="card-title">Personal Info</h4>
                                    <div class="card-body">
                <div class="form-group">
                    <label for="Name">Employee full Name</label>
                    <input type="text" name="name" class="form-control" id="Name" placeholder="Enter Your Full Name" >
                </div>

                <div class="form-group">
                    <label>Gender</label>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="customRadio1" value="1" name="gender" >
                        <label for="customRadio1" class="custom-control-label">male</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="customRadio2" value="2" name="gender" >
                        <label for="customRadio2" class="custom-control-label">female</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="customRadio3" value="3" name="gender">
                        <label for="customRadio3" class="custom-control-label">costom</label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Designation</label>
                    <select class="form-control input-sm" name="designation">
                        <option selected="" value="" >Choose one</option>
                        <option value="1" >senior engineer</option>
                        <option value="2" >junior engineer</option>
                        <option value="3">manager</option>
                        <option value="4">accountant</option>                        
                        <option value="5">designer</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="Email1">Email address</label>
                    <input type="email" name="email" class="form-control" id="Email1" placeholder="Enter email">
                </div>

                <div class="form-group">
                    <label for="Contact">Contact</label>
                    <input type="text" name="contact" class="form-control" id="Contact" placeholder="Enter Your Contact Number" >
                </div>

                <div class="form-group">
                    <label for="Sellary">Sellary</label>
                    <input type="text" name="sellary" class="form-control" id="Sellary" placeholder="Sellary" >
                </div>
            </div>
                                    
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-primary">Submit</button>
			                            <a href="{{route('employee.index')}}">
									    	<button type="button" class="btn btn-primary" style="float: right;">Go Back</button>
									    </a> 
                                    </div>
                                </div>
                            </form>
                        </div>
</div>
<div class="col-md-2"></div>
</div>
@endsection