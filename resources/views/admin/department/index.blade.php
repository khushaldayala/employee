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
                                Department Table
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>SN</th>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @if(count($departments))
                                        @foreach($departments as $key => $department)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$department->name}}</td>
                                            <td>{{$department->description}}</td>
                                            <td><center><a href="{{route('department.edit',[$department->id])}}">
                                                    <i class="fas fa-edit"></i></td>
                                                </a></center>
                                            <td><center><a href="#" data-toggle="modal" data-target="#exampleModalCenter{{$department->id}}">
                                                    <i class="fas fa-trash"></i>

                                                </a></center>
                                               <!-- Modal -->
                                               <div class="modal fade" id="exampleModalCenter{{$department->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <form action="{{route('department.destroy',[$department->id])}}" method="post">@csrf
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