@extends('layouts.app')
@section('title') jsTable  @endsection 
@section('headone') JsTable @endsection 
@section('headtwo') Library @endsection 
@section('content')
<div class="card">
    <div class="card-body">
    <h5 class="card-title">Basic Datatable</h5>
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
                <div id="dataList"></div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
@endsection
