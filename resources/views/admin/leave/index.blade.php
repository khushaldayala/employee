@extends('admin.layouts.master')

@section('content')

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-10">

          @if(Session::has('message'))

            <div class="alert alert-success">

                {{Session::get('message')}}

            </div>

    @endif
    <div class="card-header">

                    <h4><center>{{ __('Welcome To Leave Dashboard') }}</center></h4></div>
<table class="table mt-2">

  <thead>

    <tr>

      <th scope="col">#</th>

      <th scope="col">Date From</th>

      <th scope="col">Date To</th>

      <th scope="col">Description</th>

      <th scope="col">type</th>

      <th scope="col">Reason</th>

      <th scope="col">Status</th>

      <th scope="col">Full/Half leave</th>

      <!-- <th scope="col">Edit</th>

      <th scope="col">Delete</th> -->

    </tr>

  </thead>

  <tbody>

    @if($leaves)

    @foreach($leaves as $key => $leave)

    <tr>

      <th scope="row">{{$key+1}}</th>

      <td>{{$leave->from}}</td>

      <td>{{$leave->to}}</td>

      <td>{{$leave->description}}</td>

      <td>{{$leave->type}}</td>

      <td>{{$leave->message}}</td>

      <td>

          @if($leave->status=='0')

            <p style="color:red;">Pending</p>

          @elseif($leave->status=='1')

            <p style="color:green;">Approved</p>

          @elseif($leave->status=='2')

            <p style="color:red;">Rejected</p>
          @endif
      </td>

      <td>{{$leave->leavetype}}</td>

      <!-- Edit and Delete Section --> 

      <!-- <td><a href="{{route('leave.edit',[$leave->id])}}">

                <i class="fas fa-edit"></i></a></td> -->

      <!-- <td><a href="#" data-toggle="modal" data-target="#exampleModalCenter{{$leave->id}}">

                <i class="fas fa-trash"></i></a>

                <div class="modal fade" id="exampleModalCenter{{$leave->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                  <form action="{{route('leave.destroy',[$leave->id])}}" method="post">@csrf
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
              </td> -->


    </tr>

    @endforeach

    @endif

  </tbody>

</table>

    	</div>
    </div>
</div>

@endsection