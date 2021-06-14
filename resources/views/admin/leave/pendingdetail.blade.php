@extends('admin.layouts.master')

@section('content')

<!-- <div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-10"> -->
<!-- <table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Date From</th>
      <th scope="col">Date To</th>
      <th scope="col">Description</th>
      <th scope="col">Type</th>
      <th scope="col">Reply</th>
      <th scope="col">Status</th>
      <th scope="col">Full/Half Leave</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"></th>
      <td>{{$leaves["from"]}}</td>
      <td>{{$leaves["to"]}}</td>
      <td>{{$leaves["description"]}}</td>
      <td>{{$leaves["type"]}}</td>
      <td>{{$leaves["reply"]}}</td>
      <td>
        @if($leaves["status"] == 0)
        <p style="color:red;">Pending</p>
        @elseif($leaves["status"] == 1)
        <p style="color:green;">Approved</p>
        @elseif($leaves["status"] == 2)
        <p style="color:blue;">Reject</p>
        @endif
      </td>
      <td>{{$leaves["leavetype"]}}</td>
      <td>
        
          <button class="btn btn-primary">Approve</button>
        
        <button class="btn btn-danger">Reject</button>
      </td>
    </tr>

  </tbody>
</table> -->




<!-- </div>
</div>
</div> -->

<div class="container mt-5">

    <div class="row justify-content-center">

       <div class="col-md-4">
            <div class="card">
                <div class="card-header"><h5>{{ __('Employee') }}</h5></div>
               <div class="card-body">
                <center>
                  @foreach($users as $user)
                   <center>
                    <img src="{{asset('profile')}}/{{$user->image}}" width="80" style="clip-path: circle(50% at 50% 50%);"><br>
                    <h4>{{$user->name}}</h4>
                </center>
                  @endforeach
                </center>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h5>{{ __('Leave Details') }}</h5></div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-6">
                    <label class="col-sm-6 "><b>From</b></label>  
                      :  {{$leaves["from"]}}
                    </div>
                    <div class="col-sm-6">
                    <label class="col-sm-6 "><b>To</b></label>  
                      :  {{$leaves["to"]}}
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                    <label class="col-sm-6 "><b>Leave Type</b></label>  
                      :  {{$leaves["type"]}}
                    </div>
                    <div class="col-sm-6">
                    <label class="col-sm-6 "><b>Full/Half Leave</b></label>  
                      :  {{$leaves["leavetype"]}}
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                    <label class="col-sm-6 "><b>Description</b></label>  
                      :  {{$leaves["description"]}}
                    </div>
                    @if($leaves["message"] != '')
                    <div class="col-sm-6">
                    <label class="col-sm-6 "><b>Reason</b></label>  
                      :  {{$leaves["message"]}}
                    </div>
                    @endif
                  </div>
                  <!-- <div class="row">
                    <center>
                        @if($leaves["status"] == 0)
                        <p style="color:red;">Pending</p>
                        @elseif($leaves["status"] == 1)
                        <p style="color:green;">Approved</p>
                        @elseif($leaves["status"] == 2)
                        <p style="color:blue;">Rejected</p>
                        @endif
                    </center>
                  </div> -->
                  <div class="row mt-4">
                    <div class="col-sm-6">
                   <!-- <a href="{{route('update.status',['id' => $leaves->id, 'status' => 1])}}">
                       <button class="btn btn-success col-sm-4 ml-3"> Approve <i class="fa fa-check" aria-hidden="true"></i></button>
                    </a> -->
                    <a href="#" data-toggle="modal" data-target="#exampleModalCenter{{$leaves->id}}">
                                                <button class="btn btn-success col-sm-4 ml-3"> Approve <i class="fa fa-check" aria-hidden="true"></i></button>    

                                                </a>
                                            </center>
                                               <!-- Modal -->
                                               <div class="modal fade" id="exampleModalCenter{{$leaves->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <form action="{{route('update.status',['id' => $leaves->id, 'status' => 1])}}" >@csrf
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Leave Confirmation</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to Approve Leave?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-success">Approve</button>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                                </div>
                    <!-- <a href="{{route('update.status',['id' => $leaves->id, 'status' => 2])}}">
                      <button class="btn btn-danger col-sm-3">Reject <i class="fa fa-times" aria-hidden="true"></i> </button>
                    </a> -->
                    <a href="#" data-toggle="modal" data-target="#exampleModalCenter1{{$leaves->id}}">
                                                 <button class="btn btn-danger col-sm-3">Reject <i class="fa fa-times" aria-hidden="true"></i> </button></a>
                                               
                                            </center>
                                               <!-- Modal -->
                                               <div class="modal fade" id="exampleModalCenter1{{$leaves->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <form action="{{route('update.status',['id' => $leaves->id, 'status' => 2])}}">@csrf
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Department</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to Reject Leave?
                                                        </div>
                                                        <div>
                                                          <input class="form-control" type="text" name="message" placeholder="Reason for rejecting leave" required="">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-danger">Reject</button>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                                </div>
                    </div>
                    <div class="col-sm-6">
                    <center>
                    <label class="col-sm-3 "><b>Status</b></label>  
                      @if($leaves["status"] == 0)
                        <p style="color:red;">Pending</p>
                        @elseif($leaves["status"] == 1)
                        <p style="color:green;">Approved</p>
                        @elseif($leaves["status"] == 2)
                        <p style="color:red;">Rejected</p>
                        @endif
                    </center>
                    </div>
                  </div>
                  </div>
                </div>
            </div>
        <div>

    </div>
</div>

@endsection


                    