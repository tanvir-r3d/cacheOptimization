@extends('layouts.app')
@section('title') Employee List @endsection 
@section('headone') Employee List(Ajax CRED) @endsection 
@section('headtwo') Library @endsection 
@section('content')
<div>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">Add Employee</button>
</div>      
<br>
<div class="card"> 
    <div class="card-body">
    <h5 class="card-title">Basic Datatable</h5>
        <div class="table-responsive">
            <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
               

                <div id="dataList"></div>
            

            </div>
        </div>
    </div>
</div>


<!-- ADD MODAL -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" id="addForm" enctype="multipart/form-data">
                    @csrf

                <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align" for="Eimage">Employee Photo
                </label>
                <div class="col-md-6 col-sm-6">
                  <img id='previmage' style="height:140px;" src="/image/avatar.jpg" alt="Employee image" class='img-responsive'>
                  <br>
                  <input type="file" id="Eimage" name="Eimage" onchange="readURL(this);">
                </div>
              </div>

                <div class="form-group">
                    <label for="Name">Employee full Name</label>
                    <input type="text" name="Ename" class="form-control" id="Ename" placeholder="Enter Your Full Name" >
                    <span id="Ename_error"></span>
                </div>

                <div class="form-group">
                    <label>Gender</label>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="customRadio1" value="Male" name="Egender" >
                        <label for="customRadio1" class="custom-control-label">male</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="customRadio2" value="Female" name="Egender" >
                        <label for="customRadio2" class="custom-control-label">female</label>
                        <br><span id="Egender_error"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label>Designation</label>
                    <select class="form-control input-sm" name="Edesignation">
                        <option selected disabled hidden>Choose one</option>
                        <option value="1" >senior engineer</option>
                        <option value="2" >junior engineer</option>
                        <option value="3">manager</option>
                        <option value="4">accountant</option>                        
                        <option value="5">designer</option>
                    </select>
                        <span id="Edesignation_error"></span>

                </div>

                <div class="form-group">
                    <label for="Email1">Email address</label>
                    <input type="email" name="Eemail" class="form-control" id="email" placeholder="Enter email">
                    <span id="Eemail_error"></span>
                </div>

                <div class="form-group">
                    <label for="Contact">Contact</label>
                    <input type="text" name="Econtact" class="form-control" id="contact" placeholder="Enter Your Contact Number" >
                    <span id="Econtact_error"></span>

                </div>

                <div class="form-group">
                    <label for="salary">Salary</label>
                    <input type="text" name="Esalary" class="form-control" id="salary" placeholder="Salary" >
                    <span id="Esalary_error"></span>

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
            </div>
        </div>
    </div>
</div>
<!-- ADD MODAL -->

<!-- EDIT MODAL -->
<div class="modal fade" id="editModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="eBody">

                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="update" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
</div>
<!-- EDIT MODAL -->

@endsection

@section('js')
    <script src="{{asset('assets/extra-libs/multicheck/datatable-checkbox-init.js')}}"></script>
    <script src="{{asset('assets/extra-libs/multicheck/jquery.multicheck.js')}}"></script>
    <script src="{{asset('assets/extra-libs/DataTables/datatables.min.js')}}"></script>
<script type="text/javascript">
$(document).ready(function(){
    dataList();
    $("#addForm").submit(function(e){
        e.preventDefault();
        var data = $('#addForm').get(0);
        
        $.ajax({
            url:"{{route('employee.store')}}",
            type:'post',
            data: new FormData(data),
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            success:function(data)
            {
                if (data.status==201) 
                {
                swal('Success!',data.message,'success');
                $("#addForm").trigger("reset");
                $("#addModal").modal('hide');
                dataList();
                }
            },
            error: function(errors) {
            let error= JSON.parse(errors.responseText).errors;
            $.each(error, function(i,m){
                $("#"+i+"_error").html("<span style='color:red;'>"+m+"</span>")
            });
        }
        });
    });


    $(document).on("click","#delete",function(){
        var id=$(this).attr('data');
        
        swal({
              title: "Are you sure?",
              text: "Once deleted, you will not be able to recover this data!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {    
                    $.ajax({
                        url:"{{url('employee')}}"+"/"+id,
                        dataType:'json',
                        data:{"_token": "{{ csrf_token() }}"},
                        type:'DELETE',
                        success:function(data)
                        {
                            if (data.status==201) 
                            {
                                swal('Success!',data.message,'success');
                                dataList();
                            }
                        }
                    });
        
        } else {
            swal("Your Data is safe!");
          }
        });

    });

$(document).on('click',".edit",function(){
    var id=$(this).attr("data");
    $.ajax({
        url:"{{url('employee')}}"+"/"+id+"/edit",
        type:"get",
        data:{"_token": "{{ csrf_token() }}"},
        dataType:'html',
        success:function(data)
        {
            $("#eBody").html(data);

            $("#editModal").modal();
        }
    });

});

$(document).on('click','#update',function(e){
    e.preventDefault();
    var value=$("#editForm").serializeArray();
    $.ajax({
        url:"{{url('employee.update')}}",
        data:value,
        dataType:'json',
        type:'get',
        success:function(data)
        {
            if (data.status==201) 
                {
                swal('Success!',data.message,'success');
                $("#editForm").trigger("reset");
                $("#editModal").modal('hide');
                dataList();
                }
        }
    });
});

});

function dataList(){
    $.ajax({
        url:"{{url('employee.list')}}",
        type:'get',
        dataType:'html',
        success:function(data)
        {
            $("#dataList").html(data);
        }
    });
};

function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#previmage')
          .attr('src', e.target.result)
          .width(140)
          .height(140);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
@endsection
