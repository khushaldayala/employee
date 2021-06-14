<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Leave;
use App\User;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leaves = Leave::latest()->where('user_id',auth()->user()->id)->get();
        return view('admin.leave.index',compact('leaves'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $leaves = Leave::latest()->where('user_id',auth()->user()->id)->limit(1)->get();
        return view('admin.leave.create',compact('leaves'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'type'=>'required',
            'from'=>'required',
            'to'=>'required',
            'description'=>'required',
            'leavetype'=>'required'
        ]);
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        $data['status'] = 0;
        $data['days'] = 0;
        $data['message'] = '';
        Leave::create($data);
        return redirect()->back();
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
        $leave = Leave::find($id);
        return view('admin.leave.edit',compact('leave'));
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
        $this->validate($request,[
            'type'=>'required',
            'from'=>'required',
            'to'=>'required',
            'description'=>'required',
            'leavetype'=>'required'
        ]);
        $data = $request->all();
        $leave = Leave::find($id);
        $data['user_id'] = auth()->user()->id;
        $data['status'] = 0;
        $data['message'] = '';
        $leave->update($data);
        return redirect()->route('leave.create')->with('message','Leave Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $leave = Leave::find($id);
        $leave->delete();
        return redirect()->back()->with('message','Leave Deleted successfully!');
    }
    public function userleavelist()
    {   
        $leaves = Leave::where('status',0)->get();
        return view('admin.leave.userleavelist',compact('leaves'));
        // return view('admin.leave.userleavelist');
    }
    public function leavestatus($id){
        
        if($id == 3)
        {
            $leaves = Leave::get();
            
        }
        else
        {
            $leaves = Leave::where('status',$id)->get();
            
        }

            return view('admin.leave.userleavelist',compact('leaves'));
        // return $leaves;
    }
    public function pendingleave($id){
        
        $leaves = Leave::find($id);
        $userId = $leaves->user_id;
        $users = User::where('id',$userId)->get();
        return view('admin.leave.pendingdetail',compact('leaves','users'));
    }
    public function updateleavestaus(Request $request, $id, $status){

        $data = $request->all();
        $leaves = Leave::find($id);
        if($status==1)
            {
                $leaves->message = '';
            }
        $leaves->status = $status;
        $leaves->update($data);
        return redirect()->back();
    }
    
}
