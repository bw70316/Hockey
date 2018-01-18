@extends('layouts.admin')


@section('content')

    @if(Session::has('deleted_user'))
        <div class="sm-col-3">
        <h3 class="bg-dark" style="width:300px; color:red;">{{session('deleted_user')}}</h3>
        @endif
        </div>

        @if(Session::has('updated_user'))
            <div class="sm-col-3">
                <h3 class="bg-dark" style="width:350px; color:darkblue;">{{session('updated_user')}}</h3>
                @endif
            </div>

            @if(Session::has('created_user'))
                <div class="sm-col-3">
                    <h3 class="bg-dark" style="width:300px; color:#077e80;">{{session('created_user')}}</h3>
                    @endif
                </div>

<h1>Users</h1>

<table class="table">
    <thead>
    <tr>
        <th>Id</th>
        <th>Photo</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Status</th>
        <th>Created</th>
        <th>Updated</th>
    </tr>
    </thead>
    <tbody>
    @if($users)

        @foreach($users as $user)

        <tr>
            <td>{{$user->id}}</td>
            <td><img style= "height: 50px" src="{{$user->photo ? $user->photo->file : "http://placehold.it/50x50"}}" alt="" class="img-responsive img-rounded"></td>
            <td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>
            <td>{{$user->email}}</td>
            <td>{{$user->role ? $user->role->name : 'User has no role'}}</td>
            <td>{{$user->is_active == 1 ? 'Active' : 'Terminated' }}</td>
            <td>{{$user->created_at->diffForHumans()}}</td>
            <td>{{$user->updated_at->diffForHumans()}}</td>
        </tr>
        @endforeach
    @endif


    </tbody>
</table>

@stop