@extends('layouts.app')
@section('title') Employee List @endsection 
@section('headone') Employee List @endsection 
@section('headtwo') Library @endsection 
@section('content')
<div>
    <a href="{{route('employee.create')}}">
    <button type="button" class="btn btn-primary">Add Employee</button>
    </a>  
</div>      
<br>
<div class="card">
    <div class="card-body">
    <h5 class="card-title">Basic Datatable</h5>
        <div class="table-responsive">
            <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="dataTables_length" id="zero_config_length">
                            <label>Show 
                                <select name="zero_config_length" aria-controls="zero_config" class="form-control form-control-sm">
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="10">10</option>
                                    <option value="100">100</option>
                                </select> entries
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div id="zero_config_filter" class="dataTables_filter">
                            <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="zero_config"></label>
                        </div>
                    </div>
                </div>

                <div id="dataList">
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

    <script src="{{asset('assets/extra-libs/multicheck/datatable-checkbox-init.js')}}"></script>
    <script src="{{asset('assets/extra-libs/multicheck/jquery.multicheck.js')}}"></script>
    <script src="{{asset('assets/extra-libs/DataTables/datatables.min.js')}}"></script>
@endsection
