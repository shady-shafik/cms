@extends('layouts.admin')




@section('content')
    <h1>Users</h1>

    {{-- table of users --}}


    <table class="table table-hover table-primary text-center mt-4  ">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
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
                    <td> {{$user->Role->name}} </td>
                    <td>{{$user->is_active === 1 ? 'Active': 'Inactive'}} </td>
                </tr>
            @endforeach
       
          @endif

    
        </tbody>
      </table>
@endsection