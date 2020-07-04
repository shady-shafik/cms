@extends('layouts.admin')


@section('content')

<table class="table table-hover table-primary text-center mt-4  ">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Title</th>
        <th scope="col">User</th>
        <th scope="col">Photo</th>
        <th scope="col">body</th>
        <th scope="col">Category</th>
        <th scope="col">created at</th>
      </tr>
    </thead>
    <tbody>

    @if ($posts)
        @foreach ($posts as $post)

        <tr>
            <td>{{$post->id}} </td>
            <td>{{$post->title}} </td>
            <td> {{$post->user->name}}</td>
            <td> <img  height="50" width="50" src="/images/{{$post->photo ? $post->photo->path : 'avarar.png' }}"> </td>
            <td> {{$post->body}} </td>
            <td> {{$post->category ? $post->category->name : 'public'}} </td>
            <td>{{$post->created_at->diffForhumans()}} </td>
            <td><a href="{{route('posts.edit' , $post)}}">Edit</a></td>
        </tr>

        @endforeach
    @endif


    </tbody>
  </table>
      
  @endsection