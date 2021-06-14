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
            <form action="{{route('leave.store')}}" method="post">

            @csrf

            <div class="card">

                <div class="card-header">

                    <h4><center>{{ __('Create Leave') }}</center></h4></div>



                <div class="card-body">

                    <div class="form-group">

                        <label>Type of Leave</label>

                        <select name="type" class="form-control @error('type') is-invalid @enderror">

                            <option value=""></option>

                            <option value="annual">annual leave</option>

                            <option value="sick">sick leave</option>

                            <option value="other">other</option>

                        </select>

                        @error('type')

                                    <span class="invalid-feedback" role="alert">

                                        <strong>{{ $message }}</strong>

                                    </span>

                                @enderror

                    </div>

                    <div class="row">

                    <div class="form-group col-md-6">

                        <label>From Date</label>

                        <input type="text" name="from" id="datepicker1" class="form-control @error('from') is-invalid @enderror">

                        @error('from')

                                    <span class="invalid-feedback" role="alert">

                                        <strong>{{ $message }}</strong>

                                    </span>

                                @enderror

                    </div>

                    <div class="form-group col-md-6">

                        <label>To Date</label>

                        <input type="text" name="to" id="datepicker2" class="form-control @error('to') is-invalid @enderror">

                        @error('to')

                                    <span class="invalid-feedback" role="alert">

                                        <strong>{{ $message }}</strong>

                                    </span>

                                @enderror

                    </div>
                    

                    </div>

                    <div class="form-group mt-3">

                        <label>Description</label>

                        <textarea class="form-control @error('description') is-invalid @enderror" name="description"></textarea>

                        @error('description')

                                    <span class="invalid-feedback" role="alert">

                                        <strong>{{ $message }}</strong>

                                    </span>

                                @enderror

                    </div>

                    <div class="form-group"><center>
                      <h5>Full Leave <input type="radio" name="leavetype" class="mr-3" value="Full-leave"> 
                      Half Leave <input type="radio" name="leavetype" class="" value="Half-leave"></h5></center>
                    </div>

                    <div class="form-group mt-3">

                        <button class="form-control btn btn-primary">Submit</button>

                    </div>

                </div>

            </div>

            </form>

        </div>

    </div>

    

    <table class="table mt-2">

  <thead>

    <tr>

      <th scope="col">#</th>

      <th scope="col">Date From</th>

      <th scope="col">Date To</th>

      <th scope="col">Description</th>

      <th scope="col">type</th>

      <th scope="col">Reply</th>

      <th scope="col">Full/Half Leave</th>

      <th scope="col">Status</th>

      <th scope="col">Edit</th>

      <th scope="col">Delete</th>

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

      <td>{{$leave->leavetype}}</td>

      <td>

          @if($leave->status=='0')

            <p style="color:red;">Pending</p>

          @else

            <p style="color:green;">Approved</p>

          @endif

      </td>
            <td>
              @if(isset(Auth()->user()->role->permission['name']['leave']['can-edit']))
      <a href="{{route('leave.edit',[$leave->id])}}">
                <i class="fas fa-edit"></i></a>
              @else
                <p style="color:red;">Access Denied</p>
              @endif
              </td>
      <td>
                @if(isset(Auth()->user()->role->permission['name']['leave']['can-delete']))
        <a href="#" data-toggle="modal" data-target="#exampleModalCenter{{$leave->id}}">
                <i class="fas fa-trash"></i></a>
                @else
                <p style="color:red;">Access Denied</p>
                @endif

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
              </td>


    </tr>

    @endforeach

    @endif

  </tbody>

</table>



</div>

@endsection

