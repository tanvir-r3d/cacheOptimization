<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Worker;
use Cache;
use App\Events\workerCreate;
class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['sl'] = 1;

        $data['datapack'] = Cache::rememberForever('worker', function () {
            return Worker::all();
        });
        return view('worker.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('worker.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required', 
            'gender'=>'required',
            'email'=>'required|unique:worker,Wemail',
            'designation'=>'required',
            'contact'=>'required',
            'sellary'=>'required'
        ]);

        if($request->hasFile('image'))
        {
            $filetype=$request->file('image')->getClientOriginalExtension();
            $path=public_path('image/workerImg/');
            $image='Worker'.time().'.'.$filetype;
            $request->file('image')->move($path,$image);
        }
        else
        {
            $image='';
        }

        $input=['Wname'=>$request->name, 
            'Wgender'=>$request->gender,
            'Wemail'=>$request->email,
            'Wdesignation'=>$request->designation,
            'Wcontact'=>$request->contact,
            'Wsellary'=>$request->sellary,
            'Wimage'=>$image
        ];
        Worker::create($input);
        event(new workerEvent);
        return redirect()->route('worker.create')->with('msg','Data Successfully Inserted');
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
        $data['datapack']=collect(Cache::get('worker'))->where('id',$id)->first();
        return view('worker.edit',$data);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required', 
            'gender'=>'required',
            'email'=>'required|unique:worker,Wemail,'.$id.'',
            'designation'=>'required',
            'contact'=>'required',
            'sellary'=>'required'
        ]);

        $input=['Wname'=>$request->name, 
            'Wgender'=>$request->gender,
            'Wemail'=>$request->email,
            'Wdesignation'=>$request->designation,
            'Wcontact'=>$request->contact,
            'Wsellary'=>$request->sellary
        ];
        Worker::where('id',$id)->update($input);
        event(new workerEvent);
        return redirect()->route('worker.edit',$id)->with('msg','Data Successfully Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Worker::find($id);
        unlink(public_path('image/workerImg/').$data['Wimage']);
        Worker::where('id',$id)->delete();
        event(new workerEvent);
        return redirect()->route('worker.index');    
    }
}
