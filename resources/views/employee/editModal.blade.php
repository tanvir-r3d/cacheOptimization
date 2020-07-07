<form method="post" id="editForm">
                    @csrf
                <div class="form-group">
                    <label for="Name">Employee full Name</label>
                    <input type="text" name="Ename" class="form-control" id="Ename" value="{{$data->Ename}}">
                    <span id="Ename_error"></span>
                </div>

                <div class="form-group">
                    <label>Gender</label>
                    <div class="custom-control custom-radio">
                        <input class="radio" type="radio" id="male" value="Male" name="Egender" {{$data->Egender=='Male' ? 'checked':''}}>
                        <label for="male">Male</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="radio" type="radio" id="female" value="Female" name="Egender" {{$data->Egender=='Female' ? 'checked':''}}>
                        <label for="female" >Female</label>
                        <br><span id="Egender_error"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label>Designation</label>
                    <select class="form-control input-sm" name="Edesignation">
                        <option selected disabled hidden>Choose one</option>
                        <option {{$data->Edesignation==1 ? 'selected':''}} value="1" >senior engineer</option>
                        <option {{$data->Edesignation==2 ? 'selected':''}} value="2" >junior engineer</option>
                        <option {{$data->Edesignation==3 ? 'selected':''}} value="3">manager</option>
                        <option {{$data->Edesignation==4 ? 'selected':''}} value="4">accountant</option>                        
                        <option {{$data->Edesignation==5 ? 'selected':''}} value="5">designer</option>
                    </select>
                        <span id="Edesignation_error"></span>

                </div>

                <div class="form-group">
                    <label for="Email1">Email address</label>
                    <input type="email" name="Eemail" class="e_Eemail form-control" id="email" value="{{$data->Eemail}}">
                    <span id="Eemail_error"></span>
                </div>

                <div class="form-group">
                    <label for="Contact">Contact</label>
                    <input type="text" name="Econtact" class="form-control" id="contact" value="{{$data->Econtact}}" >
                    <span id="Econtact_error"></span>

                </div>

                <div class="form-group">
                    <label for="salary">Salary</label>
                    <input type="text" name="Esalary" class="form-control" id="salary" value="{{$data->Esalary}}">
                    <span id="Esalary_error"></span>
                </div>

                <input type="hidden" name="eid" id="eid" value="{{$data->id}}">
            </form>