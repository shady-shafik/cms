@extends('layouts.admin')


@section('content')
@if (Session::get('deleted') )
    <p class="alert alert-success">{{ Session::get('deleted') }} </p>
@endif
    <h1>Users</h1>

    {{-- table of users --}}


    <table class="table table-hover table-bordered text-center mt-4  ">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Photo</th>
            <th scope="col">Role</th>
            <th scope="col">status</th>
          </tr>
        </thead>
        <tbody>

          @if ($users)
              
            @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}} </td>
                    <td>{{$user->name}} </td>
                    <td> {{$user->email}}</td>
                    <td> <img  height="50" width="50" src="/images/{{$user->photo ? $user->photo->path : 'avarar.png' }}"> </td>
                    <td> {{$user->Role->name}} </td>
                    <td>{{$user->is_active === 1 ? 'Active': 'Inactive'}} </td>
                    <td><a href="{{route('users.edit' , $user)}}">Edit</a></td>
                </tr>
            @endforeach
       
          @endif

    
        </tbody>
      </table>
@endsection