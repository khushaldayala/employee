@extends('admin.layouts.master')

@section('content')

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-10">

            <form action="{{route('leave.update',[$leave->id])}}" method="post">

            @csrf

            {{method_field('PATCH')}}

            <div class="card">

                <div class="card-header">

                    <h4><center>{{ __('Update Leave Detail') }}</center></h4></div>



                <div class="card-body">

                    <div class="form-group">

                        <label>Type of Leave</label>

                        <select name="type" class="form-control @error('type') is-invalid @enderror">

                            <option value="{{$leave->type}}">{{$leave->type}}</option>

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

                        <input type="text" name="from" id="datepicker1" class="form-control @error('from') is-invalid @enderror" value="{{$leave->from}}">

                        @error('from')

                                    <span class="invalid-feedback" role="alert">

                                        <strong>{{ $message }}</strong>

                                    </span>

                                @enderror

                    </div>

                    <div class="form-group col-md-6">

                        <label>To Date</label>

                        <input type="text" name="to" id="datepicker2" class="form-control @error('to') is-invalid @enderror" value="{{$leave->to}}">

                        @error('to')

                                    <span class="invalid-feedback" role="alert">

                                        <strong>{{ $message }}</strong>

                                    </span>

                                @enderror

                    </div>

                    </div>

                    <div class="form-group mt-3">

                        <label>Description</label>

                        <textarea class="form-control @error('description') is-invalid @enderror" name="description">{{$leave->description}}</textarea>

                        @error('description')

                                    <span class="invalid-feedback" role="alert">

                                        <strong>{{ $message }}</strong>

                                    </span>

                                @enderror

                    </div>
                    <div class="form-group"><center>
                      <h5>Full Leave <input type="radio" name="leavetype" class="mr-3" value="Full-leave" @if($leave->leavetype == 'Full-leave') checked @endif> 
                      Half Leave <input type="radio" name="leavetype" class="" value="Half-leave" @if($leave->leavetype == 'Half-leave') checked @endif></h5></center>
                    </div>


                    <div class="form-group mt-3">

                        <button class="form-control btn btn-primary">Update</button>

                    </div>

                </div>

            </div>

            </form>

        </div>

    </div>


</div>

@endsection

