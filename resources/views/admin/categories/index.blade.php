@extends('layouts.admin')


@section('content')
    <h1>Categories</h1>
    <div class="row">

    {{-- display categories --}}
    <div class=" col mx-auto mt-3 text-center">
        @if ($categories)   
        <table class="  table table-hover table-bordered table-hover">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Created at </th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td><a href="{{route('categories.edit' , $category->id)}} ">{{$category->name}}</a></td>
                    <td>{{$category->created_at->diffForhumans()}}</td>
                    {{-- delete category form  --}}

                    <form method="POST" action="{{route('categories.destroy' , $category->id)}} ">
                        @csrf
                        @method('DELETE')
                    <td><input type="submit" value="Delete"  class="btn btn-outline-dark btn-sm"></td>

                    </form>
                </tr>
                @endforeach
            </tbody>
          </table>
          @endif
        
        </div>

        {{-- create category form --}}
    <div class="col mt-3">
        <h4>create new category</h4>
        <form method="POST" action=" {{route('categories.store')}} ">
            @csrf
            @method('POST')

            <div class="form-group">
                <input type="text" name="name" class="form-control border border-primary">
            </div>
            <div class="form-group">
                <input type="submit" value="submit" class="btn btn-primary">
            </div>
        </form>
    </div>
    </div>
@endsection
