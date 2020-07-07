<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use Validator;
use Cache;
use App\Events\employeeEvent;

class EmployeeController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employee.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        Cache::rememberForever('employee', function () {
                        return Employee::get();
                        });
        $employees = Cache::get('employee');
        
        return view('employee.dataList',['employees'=>$employees]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee = new Employee;
        $validation=Validator::make($request->all(),$employee->validation());

        if($validation->fails())
        {
            $status=500;
            $response=[
                'status'=>$status,
                'errors'=>$validation->errors(),
            ];
        }
        else
        {
           if ($request->hasFile('Eimage')) 
            {
                $filetype=$request->file('Eimage')->getClientOriginalExtension();
                $path=public_path('image/empImg/');
                $Eimage='Emp'.time().'.'.$filetype;
                $request->file('Eimage')->move($path,$Eimage);
            }

            $input=[
            'Eimage'=>$Eimage,
            'Ename'=>$request->Ename,
            'Egender'=>$request->Egender,
            'Edesignation'=>$request->Edesignation,
            'Eemail'=>$request->Eemail,
            'Econtact'=>$request->Econtact,
            'Esalary'=>$request->Esalary,
            ];

            Employee::create($input);
            $status=201;
            $response=[
                'status'=>$status,
                'message'=>'Employee Added',
            ];
        }
        event(new employeeEvent);
        return response()->json($response,$status);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $data=collect(Cache::get('employee'))->where('id',$id)->first();
        return view("employee.editModal",['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $employee = new Employee;
        $validation=Validator::make($request->all(),$employee->validation());

        $id=$request->eid;

        if($validation->fails())
        {
                    $status=500;
                    $response=[
                        'status'=>$status,
                        'errors'=>$validation->errors(),
                    ];
                }
                else
                {
                    $update=[
                        'Ename'=>$request->Ename,
                        'Egender'=>$request->Egender,
                        'Edesignation'=>$request->Edesignation,
                        'Eemail'=>$request->Eemail,
                        'Econtact'=>$request->Econtact,
                        'Esalary'=>$request->Esalary
                    ];

                    $employee->where('id',$id)->update($update);
                    $status=201;
                    $response=[
                        'status'=>$status,
                        'message'=>'Employee Updated',
                    ];
                }
        event(new employeeEvent);

                return response()->json($response,$status);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Employee::find($id);
        unlink(public_path('image/empImg/').$data['Eimage']);
        Employee::where('id',$id)->delete();
        $status=201;
            $response=[
                'status'=>$status,
                'message'=>'Employee Deleted',
            ];
        event(new employeeEvent);

        return response()->json($response,$status);
    }
}
