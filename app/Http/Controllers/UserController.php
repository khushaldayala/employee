<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
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
            'firstname'=>'required', 'string', 'max:255',
            'lastname'=>'required', 'string', 'max:255',
            'email'=>'required', 'string', 'email', 'max:255', 'unique:users',
            'password'=>'required', 'string', 'min:8',
            'address'=>'required',
            'mobile_number'=>'required', 'number', 'max:10',
            'department'=>'required',
            'role'=>'required',
            'designation'=>'required',
            'start_date'=>'required',
            'image'=>'required|mimes:jpg,png,jpeg'
        ]);

        
        $image = $request->file('image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/profile');
        $image->move($destinationPath,$name);
        $user = new User;
        $user->name = $request->firstname.' '.$request->lastname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->address = $request->address;
        $user->mobile_number = $request->mobile_number;
        $user->department_id = $request->department;
        $user->role_id = $request->role;
        $user->designation = $request->designation;
        $user->start_date = $request->start_date;
        $user->image = $name;
        return "done";  

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
