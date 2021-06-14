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
        $users = User::get();
        return view('admin.user.index',compact('users'));
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
            'email'=>'required|string|email|max:255|unique:users,email',
            'password'=>'required|string|min:8',
            'address'=>'required',
            'mobile_number'=>'required',
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

        User::create([
            'name'=>$request->get('firstname').' '.$request->get('lastname'),
            'email'=>$request->get('email'),
            'password'=>Hash::make($request->password),
            'address'=>$request->get('address'),
            'mobile_number'=>$request->get('mobile_number'),
            'department_id'=>$request->get('department'),
            'role_id'=>$request->get('role'),
            'designation'=>$request->get('designation'),
            'start_from'=>$request->get('start_date'),
            'image'=>$name
        ]);
        return redirect()->route('user.index')->with('message','User Create successfully!');
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
        $user = User::find($id);
        return view('admin.user.edit',compact('user'));
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
            'fullname'=>'required', 'string', 'max:255',
            'email'=>'required','unique:users',
            'password'=>'required|string|min:8',
            'address'=>'required',
            'mobile_number'=>'required',
            'department'=>'required',
            'role'=>'required',
            'designation'=>'required',
            'start_date'=>'required',
            'image'=>'mimes:jpg,png,jpeg'
        ]);
        $user = User::find($id);
        $name = $user->image;
        $password = $user->password;

        if($request->password)
        {
            $password = Hash::make($request->password);
        }

        if($request->hasFile('image')){
           $image = $request->file('image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/profile');
        $image->move($destinationPath,$name); 
        }
        $user->name = $request->fullname;
        $user->email = $request->email;
        $user->password = $password;
        $user->address = $request->address;
        $user->mobile_number = $request->mobile_number;
        $user->department_id = $request->department;
        $user->role_id = $request->role;
        $user->designation = $request->designation;
        $user->start_from = $request->start_date;
        $user->image = $name;
        $user->save();  
        return redirect()->route('user.index')->with('message','User Updated successfully!');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.index')->with('message','User Deleted Successfully');
    }
}
