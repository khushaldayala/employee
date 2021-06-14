@extends('admin.layouts.master')



@section('content')

<div id="layoutAuthentication">

            <div id="layoutAuthentication_content">

                <main>

                    <div class="container">

                    <div class="card-header"><h3 class="text-center font-weight-light">Update Employee</h3></div>

                        <div class="row">

                            <div class="col-lg-10">

                                <div class="card shadow-lg border-0 rounded-lg mt-5">

                                    <div class="card-header"><h3 class="text-center font-weight-light">Update User Information</h3></div>

                                    <div class="card-body">

                                        <form action="{{route('user.update',[$user->id])}}" enctype="multipart/form-data" method="post">@csrf

                                            {{method_field('PUT')}}

                                        <div class="form-group">

                                            <input type="text" name="fullname" class="form-control  @error('fullname') is-invalid @enderror" placeholder="Full Name" value="{{$user->name}}">

                                            @error('fullname')

                                            <span class="invalid-feedback" role="alert">

                                                <strong>{{ $message }}</strong>

                                            </span>

                                        @enderror

                                        </div>

                                        <div class="row mb-3">

                                        <div class="form-group">

                                            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{$user->email}}">

                                            @error('email')

                                            <span class="invalid-feedback" role="alert">

                                                <strong>{{ $message }}</strong>

                                            </span>

                                        @enderror

                                        </div>

                                        <div class="form-group">

                                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" value="{{$user->password}}">

                                            @error('password')

                                            <span class="invalid-feedback" role="alert">

                                                <strong>{{ $message }}</strong>

                                            </span>

                                        @enderror

                                        </div>

                                        <div class="form-group">

                                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Address" value="{{$user->address}}">

                                            @error('address')

                                            <span class="invalid-feedback" role="alert">

                                                <strong>{{ $message }}</strong>

                                            </span>

                                        @enderror

                                        </div>

                                        <div class="form-group">

                                            <input type="number" name="mobile_number" class="form-control @error('mobile_number') is-invalid @enderror" placeholder="Mobile Number" value="{{$user->mobile_number}}">

                                            @error('mobile_number')

                                            <span class="invalid-feedback" role="alert">

                                                <strong>{{ $message }}</strong>

                                            </span>

                                        @enderror

                                        </div>

                                        <div class="form-group">

                                            <select name="department" class="form-control @error('department') is-invalid @enderror">

                                                <option value="">Select Company</option>

                                                @foreach(App\Department::all() as $department)

                                                    <option value="{{$department->id}}" @if($department->id==$user->department_id)

                                                    selected

                                                     @endif >

                                                    {{$department->name}}</option>

                                                @endforeach

                                            </select>

                                            @error('department')

                                                        <span class="invalid-feedback" role="alert">

                                                            <strong>{{ $message }}</strong>

                                                        </span>

                                            @enderror

                                        </div>

                                        <div class="form-group">

                                            <input type="text" name="designation" placeholder="Designation" class="form-control @error('designation') is-invalid @enderror" value="{{$user->designation}}">

                                            @error('designation')

                                            <span class="invalid-feedback" role="alert">

                                                <strong>{{ $message }}</strong>

                                            </span>

                                        @enderror

                                        </div>

                                        <div class="form-group">

                                            <select name="role" class="form-control @error('role') is-invalid @enderror">

                                                <option value="">Select Role</option>

                                                @foreach(App\Role::all() as $role)

                                                <!-- <option>Select Role</option> -->

                                                    <option value="{{$role->id}}" @if($role->id==$user->role_id)

                                                    selected

                                                     @endif >

                                                     {{$role->name}}</option>

                                                @endforeach

                                            </select>

                                            @error('role')

                                                        <span class="invalid-feedback" role="alert">

                                                            <strong>{{ $message }}</strong>

                                                        </span>

                                            @enderror

                                        </div>

                                        <div class="form-group">

                                            <input type="text" id="datepicker3" name="start_date" placeholder="Start Date" class="form-control @error('start_date') is-invalid @enderror" value="{{$user->start_from}}">

                                            @error('start_date')

                                            <span class="invalid-feedback" role="alert">

                                                <strong>{{ $message }}</strong>

                                            </span>

                                        @enderror

                                        </div>

                                        <div class="form-group">

                                            <input type="file" name="image" class="form-control  @error('image') is-invalid @enderror" accept="image/*">

                                            <br><img src="{{asset('profile')}}/{{$user->image}}" width="100">

                                            @error('image')

                                            <span class="invalid-feedback" role="alert">

                                                <strong>{{ $message }}</strong>

                                            </span>

                                        @enderror

                                        </div>

                                        <div class="form-group">

                                            <button type="submit" class="btn btn-primary">Update</button>

                                        </div>

                                        </form>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </main>

            </div>

                    

@endsection