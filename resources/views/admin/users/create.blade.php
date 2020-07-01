@extends('layouts.admin')


@section('content')
    <h1>create user</h1>


    {!! Form::open(['action' => 'AdminUsersController@store' , 'files' => true]) !!}

    <div class="form-group">
        {!! Form::label('name' , ' User name :') !!}
        {!! Form::text('name',null , ['class' =>'form-control border border-primary w-75']) !!}
            
        @error('name')
        <div class="alert alert-danger w-75">{{$message}}</div>
        @enderror
    </div>
 

    <div class="form-group">
        {!! Form::label('email' , ' User email :') !!}
        {!! Form::text('email',null , ['class' =>' form-control border border-primary w-75' ]) !!}
    
        @error('email')
        <div class="alert alert-danger w-75">{{$message}}</div>
        @enderror

    </div>


    <div class="form-group">
        {!! Form::label('password' , ' Password :') !!}
        {!! Form::password('password', ['class' =>'form-control border border-primary w-75']) !!}
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
        {!! Form::select('role_id', [1 => 'subscriber' , 2 => 'author' , 3 => 'admin'] , null,['class' =>'form-control border border-primary w-50']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('is_active' , ' status :') !!}
        {!! Form::select('is_active', [1 => 'active' , 0 => 'inactive' ] ,1,['class' =>'form-control border border-primary w-50']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('create',['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@endsection

