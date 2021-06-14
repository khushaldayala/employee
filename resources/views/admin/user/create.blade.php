@extends('admin.layouts.master')



@section('content')

<div id="layoutAuthentication">

            <div id="layoutAuthentication_content">

                <main>

                    <div class="container">

                    <div class="card-header"><h3 class="text-center font-weight-light">Register Employee</h3></div>

                        <div class="row">

                            <div class="col-lg-12">

                                <div class="card shadow-lg border-0 rounded-lg mt-5">

                                    <div class="card-header"><h3 class="text-center font-weight-light">General Information</h3></div>

                                    <div class="card-body">

                                        <form action="{{route('user.store')}}" enctype="multipart/form-data" method="post">@csrf

                                        <div class="row mb-3">

                                        <div class="form-group col-md-6">

                                            <input type="text" name="firstname" class="form-control  @error('firstname') is-invalid @enderror" placeholder="Firtname">

                                            @error('firstname')

                                            <span class="invalid-feedback" role="alert">

                                                <strong>{{ $message }}</strong>

                                            </span>

                                        @enderror

                                        </div>

                                        <div class="form-group col-md-6">

                                            <input type="text" name="lastname" class="form-control  @error('lastname') is-invalid @enderror" placeholder="Lastname">

                                            @error('lastname')

                                            <span class="invalid-feedback" role="alert">

                                                <strong>{{ $message }}</strong>

                                            </span>

                                        @enderror

                                        </div>

                                    </div>

                                        <div class="row mb-3">

                                        <div class="form-group">

                                            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email">

                                            @error('email')

                                            <span class="invalid-feedback" role="alert">

                                                <strong>{{ $message }}</strong>

                                            </span>

                                        @enderror

                                        </div>

                                        <div class="form-group">

                                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">

                                            @error('password')

                                            <span class="invalid-feedback" role="alert">

                                                <strong>{{ $message }}</strong>

                                            </span>

                                        @enderror

                                        </div>

                                        <div class="form-group">

                                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Address">

                                            @error('address')

                                            <span class="invalid-feedback" role="alert">

                                                <strong>{{ $message }}</strong>

                                            </span>

                                        @enderror

                                        </div>

                                        <div class="form-group">

                                            <input type="number" name="mobile_number" class="form-control @error('mobile_number') is-invalid @enderror" placeholder="Mobile Number">

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

                                                    <option value="{{$department->id}}">{{$department->name}}</option>

                                                @endforeach

                                            </select>

                                            @error('department')

                                                        <span class="invalid-feedback" role="alert">

                                                            <strong>{{ $message }}</strong>

                                                        </span>

                                            @enderror

                                        </div>

                                        <div class="form-group">

                                            <input type="text" name="designation" placeholder="Designation" class="form-control @error('designation') is-invalid @enderror">

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

                                                    <option value="{{$role->id}}">{{$role->name}}</option>

                                                @endforeach

                                            </select>

                                            @error('role')

                                                        <span class="invalid-feedback" role="alert">

                                                            <strong>{{ $message }}</strong>

                                                        </span>

                                            @enderror

                                        </div>

                                        <div class="form-group">

                                            <input type="" id="datepicker" name="start_date" placeholder="Start Date" class="form-control @error('start_date') is-invalid @enderror">

                                            @error('start_date')

                                            <span class="invalid-feedback" role="alert">

                                                <strong>{{ $message }}</strong>

                                            </span>

                                        @enderror

                                        </div>

                                        <div class="form-group">

                                            <input type="file" name="image" class="form-control  @error('image') is-invalid @enderror" accept="image/*">

                                            @error('image')

                                            <span class="invalid-feedback" role="alert">

                                                <strong>{{ $message }}</strong>

                                            </span>

                                        @enderror

                                        </div>

                                        <div class="form-group">

                                            <button type="submit" class="btn btn-primary">Submit</button>

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