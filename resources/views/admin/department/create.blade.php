@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="{{route('department.store')}}" method="post">
            @csrf
            <div class="card">
                <div class="card-header">{{ __('Department Create') }}</div>

                <div class="card-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
                    <div class="form-group mt-3">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
