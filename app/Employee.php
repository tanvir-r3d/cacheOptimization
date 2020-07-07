<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Employee extends Model
{
    public $table = 'employee';
    public $fillable= ['Ename','Egender','Edesignation','Eemail','Econtact','Esalary','Eimage'];

    public function validation()
    {
    	return [
    		'Ename'=> 'required',
    		'Egender'=> 'required',
    		'Edesignation'=> 'required',
    		'Eemail'=> 'required',
    		'Econtact'=> 'required',
    		'Esalary'=> 'required',
    	];
    }

    public function message()
    {
    	return [
    		'Ename.required'=> 'Employee Name Required',
    		'Egender.required'=> 'Employee Gender Required',
    		'Edesignation.required'=> 'Employee Designation Required',
    		'Eemail.required'=> 'Employee Email Required',
    		'Econtact.required'=> 'Employee Contact Required',
    		'Esalary.required'=> 'Employee Salary Required',
    	];
    }
}
