@extends('admin.layouts.master')

@section('content')

<div class="container-fluid px-4 mt-4">
<!-- <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">All Department</li>
  </ol>
</nav> -->
 @if(Session::has('message'))
    <div class="alert alert-success">
        {{Session::get('message')}}
    </div>
    @endif
<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                All User
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>Mobile</th>
                                            <th>Department</th>
                                            <th>Designation</th>
                                            <th>Role</th>
                                            <th>Start_Date</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>Mobile</th>
                                            <th>Department</th>
                                            <th>Designation</th>
                                            <th>Role</th>
                                            <th>Start_Date</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @if(count($users))
                                        @foreach($users as $key => $user)
                                        <tr>
                                            <td><img src="{{asset('profile')}}/{{$user->image}}" width="100"></td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->address}}</td>
                                            <td>{{$user->mobile_number}}</td>
                                            <td>{{$user->department->name}}</td>
                                            <td>{{$user->designation}}</td>
                                            <td>{{$user->role->name}}</td>
                                            <td>{{$user->start_from}}</td>
                                            <td><center>
                                                @if(isset(Auth()->user()->role->permission['name']['user']['can-edit']))
                                                <a href="{{route('user.edit',[$user->id])}}">
                                                    <i class="fas fa-edit"></i></td>
                                                </a>
                                                @else
                                                <span style="color:red">Access Denied</span>
                                                @endif
                                            </center>
                                            <td><center>
                                                @if(isset(Auth()->user()->role->permission['name']['user']['can-delete']))
                                                <a href="#" data-toggle="modal" data-target="#exampleModalCenter{{$user->id}}">
                                                    <i class="fas fa-trash"></i>

                                                </a>
                                                @else
                                                <span style="color:red">Access Denied</span>
                                                @endif
                                            </center>
                                               <!-- Modal -->
                                               <div class="modal fade" id="exampleModalCenter{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <form action="{{route('user.destroy',[$user->id])}}" method="post">@csrf
                                                    {{method_field('DELETE')}}
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Department</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                       
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Model -->
                        
                    </div>

@endsection