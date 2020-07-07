@extends('layouts.app')
@section('title') Worker List @endsection 
@section('headone') Worker List(Simple CRED With Laravel with out js) @endsection 
@section('headtwo') Library @endsection 
@section('content')
<div>
    <a href="{{route('worker.create')}}">
    <button type="button" class="btn btn-primary">Add Worker</button>
    </a>  
</div>      
<br>
<div class="card">
    <div class="card-body">
    <h5 class="card-title"> Datatable</h5>
        <div class="table-responsive">
            <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="dataTables_length" id="zero_config_length">
                            <label>Show 
                                <select name="zero_config_length" aria-controls="zero_config" class="form-control form-control-sm" id="perPage" >
                                    
                                    <option value="10">10</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="500">500</option>
                                </select> entries
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div id="zero_config_filter" class="dataTables_filter">
                            <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="zero_config" id="search"></label>
                        </div>
                    </div>
                </div>

                        <table id="zero_config" class="table table-striped table-bordered dataTable" role="grid" aria-describedby="zero_config_info">
                            <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1"  aria-label="Name: activate to sort column descending" aria-sort="ascending">SL</th>
                                <th>Profile</th>
                                <th class="sorting_asc" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1"  aria-label="Name: activate to sort column descending" aria-sort="ascending">Name</th>
                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1"  aria-label="Position: activate to sort column ascending">Gender</th>
                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1"  aria-label="Position: activate to sort column ascending">Designation</th>
                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1"  aria-label="Age: activate to sort column ascending">Email</th>
                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1"  aria-label="Start date: activate to sort column ascending">Contact</th>
                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1"  aria-label="Salary: activate to sort column ascending">Salary</th>
                                <th  tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1">Action</th>
                            </tr>
                            </thead>
                            <tbody>      
                                @foreach($datapack as $data)
                                <tr role="row" class="odd">
                                    <td>{{$sl++}}</td>
                                    <td><img src="/image/workerImg/{{$data->Wimage}}" alt="Worker" class="rounded-circle" width="50"></td>
                                    <td>{{$data->Wname}}</td>
                                    <td>
                                        @if($data->Wgender==1){{"Male"}}
                                        @elseif($data->Wgender==2){{"female"}}
                                        @endif
                                    </td>
                                    <td>
                                        @if($data->Wdesignation==1){{"senior engineer"}}
                                        @elseif($data->Wdesignation==2){{"junior engineer"}}
                                        @elseif($data->Wdesignation==3){{"manager"}}
                                        @elseif($data->Wdesignation==4){{"accountant"}}
                                        @elseif($data->Wdesignation==5){{"designer"}}
                                        @endif
                                    </td>
                                    <td>{{$data->Wemail}}</td>
                                    <td>{{$data->Wcontact}}</td>
                                    <td>{{$data->Wsellary}}</td>
                                    <td>
                                        <a href="{{route('worker.edit', $data->id)}}"><button class="btn btn-info btn-xs"><i class="fas fa-edit"></i></button></a>

                                        <form method="post" action="{{route('worker.delete',$data->id)}}">@csrf<button class="btn btn-danger btn-xs" type="submit"><i class="fas fa-trash"></i></button></form>
                                    </td>
                                </tr>
                                @endforeach
                                           
                            </tbody>
                            <tfoot>
                                <tr><th rowspan="1" colspan="1">SL</th><th rowspan="1" colspan="1">Name</th><th rowspan="1" colspan="1">Gender</th><th rowspan="1" colspan="1">Designation</th><th rowspan="1" colspan="1">Email</th><th rowspan="1" colspan="1">Contact</th><th rowspan="1" colspan="1">Salary</th><th rowspan="1" colspan="1">Action</th></tr>
                            </tfoot>
                        </table>    
                    
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
@endsection
