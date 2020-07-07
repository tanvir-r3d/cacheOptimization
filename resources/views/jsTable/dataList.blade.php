
                        <table id="zero_config" class="table table-striped table-bordered dataTable" role="grid" aria-describedby="zero_config_info">
                            <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1"  aria-label="Name: activate to sort column descending" aria-sort="ascending">Name</th>
                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1"  aria-label="Position: activate to sort column ascending">Gender</th>
                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1"  aria-label="Office: activate to sort column ascending">Designation</th>
                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1"  aria-label="Age: activate to sort column ascending">Email</th>
                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1"  aria-label="Start date: activate to sort column ascending">Contact</th>
                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1"  aria-label="Salary: activate to sort column ascending">Salary</th>
                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1">Action</th>
                            </tr>
                            </thead>
                            <tbody>      
                                @foreach($info as $data)
                                <tr role="row" class="odd">
                                    <td>{{$sl++}}</td>
                                    <td>{{$data->Ename}}</td>
                                    <td>{{$data->Egender}}</td>
                                    <td>{{$data->Edesignation}}</td>
                                    <td>{{$data->Eemail}}</td>
                                    <td>{{$data->Econtact}}</td>
                                    <td>{{$data->Esellary}}</td>
                                    <td>
                                        <button class="edit btn btn-info btn-xs" data="{{$data->id}}"><i class="fas fa-edit"></i></button>
                                        <button type="button" class="delete btn btn-danger btn-xs" data="{{$data->id}}"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                                  {$info->links()}}          
                            </tbody>
                            <tfoot>
                                <tr><th rowspan="1" colspan="1">Name</th><th rowspan="1" colspan="1">Gender</th><th rowspan="1" colspan="1">Designation</th><th rowspan="1" colspan="1">Email</th><th rowspan="1" colspan="1">Contact</th><th rowspan="1" colspan="1">Salary</th><th rowspan="1" colspan="1">Action</th></tr>
                            </tfoot>
                        </table>
