@extends('admin.layouts.master')

@section('content')

<div class="container-fluid px-4 mt-4">
    <div class="row justify-content-center">
<div class="col-md-11">
 @if(Session::has('message'))
    <div class="alert alert-success">
        {{Session::get('message')}}
    </div>
    @endif
<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                All Permission List
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Name</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>SN</th>
                                            <th>Name</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @if(count($permissions))
                                        @foreach($permissions as $key => $permission)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$permission->role->name}}</td>
                                            <td>
                                                @if(isset(Auth()->user()->role->permission['name']['permission']['can-edit']))
                                                <a href="{{route('permission.edit',[$permission->id])}}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                @else
                                                <span style="color:red">Access Denied</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if(isset(Auth()->user()->role->permission['name']['permission']['can-delete']))<a href="#" data-toggle="modal" data-target="#exampleModalCenter{{$permission->id}}">
                                                    <i class="fas fa-trash"></i>

                                                </a>
                                                @else
                                                <span style="color:red">Access Denied</span>
                                                @endif
                                               <!-- Modal -->
                                               <div class="modal fade" id="exampleModalCenter{{$permission->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <form action="{{route('permission.destroy',[$permission->id])}}" method="post">@csrf
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
                    </div>
                   </div>
                </div>

@endsection