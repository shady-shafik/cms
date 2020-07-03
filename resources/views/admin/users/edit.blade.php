@extends('layouts.admin')


@section('content')  


<h1>Edit user</h1>

<div class="row">

    {{-- @if ($user->photo) --}}
     <div class="col-sm-3 text-center">
        <img 
            width="200" height="150"
            src="/images/{{$user->photo ? $user->photo->path :'avarar.png'}}"
            class="rounded"
            >

            <form class="mt-5" method='POST'  action=" {{route('users.destroy' , $user->id)}} ">
                {{ csrf_field() }}
                @method('DELETE')

                <div class="form-group">
                    <input class="btn btn-danger" type="submit" value="Delete">
                </div>
        </form>
    </div>

    {{-- @endif --}}

    <div class="col-sm-9 mx-auto">

        {!! Form::open([ 'method' => 'put', 'action' => ['AdminUsersController@update' , $user->id] , 'files' => true]) !!}

        <div class="form-group">
            {!! Form::label('name' , ' User name :') !!}
            {!! Form::text('name',$user->name , ['class' =>'form-control border border-primary w-75']) !!}
                
            @error('name')
            <div class="alert alert-danger w-75">{{$message}}</div>
            @enderror
        </div>
    

        <div class="form-group">
            {!! Form::label('email' , ' User email :') !!}
            {!! Form::text('email',$user->email , ['class' =>' form-control border border-primary w-75' ]) !!}
        
            @error('email')
            <div class="alert alert-danger w-75">{{$message}}</div>
            @enderror

        </div>


        <div class="form-group">
            {!! Form::label('password' , ' Password :') !!}
            {!! Form::password('password', ['class' =>'form-control border border-primary w-75'] ) !!}
            @error('password')
                <div class="alert alert-danger w-75">{{$message}}</div>
            @enderror
        </div>


        
        <div class="form-group">
            {!! Form::label('photo_id' , ' photo :') !!}
            {!! Form::file('photo_id', null , ['class' =>' w-75']) !!}
        </div>


        <div class="form-group">
            {!! Form::label('role_id' , ' Role :') !!}
            {!! Form::select('role_id', [1 => 'subscriber' , 2 => 'author' , 3 => 'admin'] , $user->role_id,['class' =>'form-control border border-primary w-50']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('is_active' , ' status :') !!}
            {!! Form::select('is_active', [1 => 'active' , 0 => 'inactive' ] ,$user->is_active,['class' =>'form-control border border-primary w-50']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Update',['class' => 'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
        
    
    </div>

 
</div>
@endsection

