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
            <form action="{{route('permission.store')}}" method="post">
            @csrf
            <div class="card">
                <div class="card-header">{{ __('Permission Create') }}</div>

                <div class="card-body">
                    <div class="form-group">
                        <select class="form-control @error('role_id') is-invalid @enderror" name="role_id">
                            <option value="">Select Role</option>
                        @foreach(App\Role::all() as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                        </select>
                        @error('role_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <br>
                        <table class="table table-striped table-dark">
                        <thead>
                            <tr>
                            <th scope="col">Permission</th>
                            <th scope="col">can-add</th>
                            <th scope="col">can-edit</th>
                            <th scope="col">can-view</th>
                            <th scope="col">can-delete</th>
                            <th scope="col">can-list</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Department</td>
                                <td><input type="checkbox" name="name[department][can-add]" value="1"></td>
                                <td><input type="checkbox" name="name[department][can-edit]" value="1"></td>
                                <td><input type="checkbox" name="name[department][can-view]" value="1"></td>
                                <td><input type="checkbox" name="name[department][can-delete]" value="1"></td>
                                <td><input type="checkbox" name="name[department][can-list]" value="1"></td>
                            </tr>
                            <tr>
                                <td>Role</td>
                                <td><input type="checkbox" name="name[role][can-add]" value="1"></td>
                                <td><input type="checkbox" name="name[role][can-edit]" value="1"></td>
                                <td><input type="checkbox" name="name[role][can-view]" value="1"></td>
                                <td><input type="checkbox" name="name[role][can-delete]" value="1"></td>
                                <td><input type="checkbox" name="name[role][can-list]" value="1"></td>
                            </tr>
                            <tr>
                                <td>Permission</td>
                                <td><input type="checkbox" name="name[permission][can-add]" value="1"></td>
                                <td><input type="checkbox" name="name[permission][can-edit]" value="1"></td>
                                <td><input type="checkbox" name="name[permission][can-view]" value="1"></td>
                                <td><input type="checkbox" name="name[permission][can-delete]" value="1"></td>
                                <td><input type="checkbox" name="name[permission][can-list]" value="1"></td>
                            </tr>
                            <tr>
                                <td>User</td>
                                <td><input type="checkbox" name="name[user][can-add]" value="1"></td>
                                <td><input type="checkbox" name="name[user][can-edit]" value="1"></td>
                                <td><input type="checkbox" name="name[user][can-view]" value="1"></td>
                                <td><input type="checkbox" name="name[user][can-delete]" value="1"></td>
                                <td><input type="checkbox" name="name[user][can-list]" value="1"></td>
                            </tr>
                            <tr>
                                <td>Leave</td>
                                <td><input type="checkbox" name="name[leave][can-add]" value="1"></td>
                                <td><input type="checkbox" name="name[leave][can-edit]" value="1"></td>
                                <td><input type="checkbox" name="name[leave][can-view]" value="1"></td>
                                <td><input type="checkbox" name="name[leave][can-delete]" value="1"></td>
                                <td><input type="checkbox" name="name[leave][can-list]" value="1"></td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection