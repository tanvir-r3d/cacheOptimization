<table id="zero_config" class="table table-striped table-bordered dataTable" role="grid" aria-describedby="zero_config_info">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Designation</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Salary</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>      
                                @php $sl=1 @endphp
                                @foreach($employees as $data)
                                <tr>
                                    <td>{{$sl++}}</td>
                                    <td>{{$data->Ename}}</td>
                                    <td>{{$data->Egender}}</td>
                                    <td>@if($data->Edesignation==1) {{'senior engineer'}} @elseif($data->Edesignation==2) {{'junior engineer'}} @else {{$data->Edesignation}} @endif</td>
                                    <td>{{$data->Eemail}}</td>
                                    <td>{{$data->Econtact}}</td>
                                    <td>{{$data->Esalary}}</td>
                                    <td>
                                        <button class="edit btn btn-info btn-xs" data="{{$data->id}}"><i class="fas fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-xs" id="delete" data="{{$data->id}}"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                                           
                            </tbody>
                        </table>