@extends('layouts.app')
@section('title') Worker Edit @endsection 
@section('headone') Worker Edit @endsection 
@section('headtwo') Library @endsection 
@section('content')
<div class="row">


<div class="col-md-12 center">
	

	
	@if(session('msg'))
        
	<div class="alert with-close alert-secondary alert-dismissible fade show">
		{{(session('msg'))}}
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
            
    @endif
	@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
    			@foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif 
	
						<div class="card">
                            <form class="form-horizontal" method="post" action="{{route('worker.update',$datapack->id)}}">@csrf
                                <div class="card-body">
                                    <h4 class="card-title">Personal Info</h4>
                                    <div class="card-body">
                <div class="form-group">
                    <label for="Name">Worker full Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="Name" placeholder="Enter Your Full Name"  value="{{old('name') ? old('name') : $datapack->Wname}}" >
                </div>

                <div class="form-group">
                    <label>Gender</label>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="customRadio1" value="1" name="gender" {{$datapack->Wgender=='1' ? 'checked' : ''}}>
                        <label for="customRadio1" class="custom-control-label" >male</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="customRadio2" value="2" name="gender"{{$datapack->Wgender=='2' ? 'checked' : ''}}>
                        <label for="customRadio2" class="custom-control-label" >female</label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Designation</label>
                    <select class="form-control input-sm" name="designation">
                        
                        <option value="1" {{$datapack->Wdesignation=='1' ? 'selected' : ''}}>senior engineer</option>
                        <option value="2" {{$datapack->Wdesignation=='2' ? 'selected' : ''}}>junior engineer</option>
                        <option value="3" {{$datapack->Wdesignation=='3' ? 'selected' : ''}}>manager</option>
                        <option value="4" {{$datapack->Wdesignation=='4' ? 'selected' : ''}}>accountant</option>                        
                        <option value="5" {{$datapack->Wdesignation=='5' ? 'selected' : ''}}>designer</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="Email1">Email address</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="Email1" placeholder="Enter email"  value="{{old('email') ? old('email') : $datapack->Wemail}}">
                </div>

                <div class="form-group">
                    <label for="Contact">Contact</label>
                    <input type="text" name="contact" class="form-control @error('contact') is-invalid @enderror" id="Contact" placeholder="Enter Your Contact Number"   value="{{old('contact') ? old('contact') : $datapack->Wcontact}}">
                </div>

                <div class="form-group">
                    <label for="Sellary">Sellary</label>
                    <input type="text" name="sellary" class="form-control @error('sellary') is-invalid @enderror" id="Sellary" placeholder="Sellary"  value="{{old('sellary') ? old('sellary') : $datapack->Wsellary}}">
                </div>
            </div>
                                    
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-primary toastsDefaultInfo">Submit</button>
			                            <a href="{{route('worker.index')}}">
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