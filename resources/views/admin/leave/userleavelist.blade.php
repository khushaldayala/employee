@extends('admin.layouts.master')

@section('content')


<link rel="stylesheet" type="text/css" href="{{asset('CSS1/userleavelist.css')}}">
<section class="wrapper">
  <div class="container">
    
                    
                      <div class="row">
                        <center>
                          
                        <a href="{{route('leaves.status',[0])}}">
                        <button class="btn btn-secondary col-md-2 mb-5"><b>Pending</b></button>
                      </a>
                        <a href="{{route('leaves.status',[1])}}">
                        <button class="btn btn-success col-md-2 mb-5"><b>Approved</b></button>
                        </a>
                        <a href="{{route('leaves.status',[2])}}">
                        <button class="btn btn-danger col-md-2 mb-5"><b>Rejected</b></button>
                        </a>
                        <a href="{{route('leaves.status',[3])}}">
                        <button class="btn btn-primary col-md-2 mb-5"><b>All</b></button>
                        </a>
                    </center>
                      </div>
    <div class="row">

     @foreach($leaves as $key => $leave)
      <div class="col-sm-3 mt-3">
        <a href="{{route('pending.leave',[$leave->id])}}"> 
        <div class="card text-white card-has-bg click-col" style="background-image:url('https://source.unsplash.com/600x900/?computer,design');">
          <img class="card-img d-none" src="https://source.unsplash.com/600x900/?computer,design" alt="Goverment Lorem Ipsum Sit Amet Consectetur dipisi?">
          <div class="card-img-overlay d-flex flex-column">
            <div class="card-body">
              
              <h4 class="card-title mt-0 "><p class="text-white"><center>{{$leave->user->name}}</center></p></h4>
              <h6><i class="far fa-clock"></i> {{$leave->user->designation}}</h6><br>
              <!-- @if($leave->status == 0)
                <div style="display: inline-flex;">
                <button class="btn btn-primary">Approve</button>
                <button class="btn btn-danger">Reject</button>
                </div>
            @endif -->
                <!-- <center><h5 class="card-meta mb-2">{{$leave->leavetype}}</h5></center> -->
                @if($leave->status == 0)
                  <center><h5 class="card-meta mb-2" style="color:yellow;">Pending</h5></center>
                @elseif($leave->status == 1)
                <center><h5 class="card-meta mb-2" style="color:green;">Approved</h5></center>
                 @elseif($leave->status == 2)
                 <center><h5 class="card-meta mb-2" style="color:red;">Rejected</h5></center>
                @endif  
            </div>
            <div class="card-footer">
              <div class="media">
                
                <img src="{{asset('profile')}}/{{$leave->user->image}}" width="100" style="clip-path: circle(50% at 50% 50%);">

                <div class="media-body">
                  <h6 class="my-0 text-white d-block"></h6>
                  <!-- <small> JustCode</small> -->
                </div>
              </div>
            </div>
          </div>
        </div>
     </a>
      </div>
      @endforeach
    </div>
  </div>
</section>

@endsection