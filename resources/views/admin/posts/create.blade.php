@extends('layouts.admin')


@section('content')
    <h1>create post</h1>

    <form method="POST"  action="{{route('posts.store')}} " enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title">Title</label>
            <input  class="form-control border border-primary  w-75 @error('title') is-invalid @enderror" type="text" name="title">
            @error('title')
            <div class="invalid-feedback">{{$message}} </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="body">Body</label>
            <textarea cols="30" rows="10" class=" border border-primary  w-75 form-control @error('body') is-invalid @enderror"  type="text" name="body" ></textarea>
                @error('body')
                    <div class="invalid-feedback">{{$message}} </div>
                @enderror
        </div>

        <div class="form-group">
            <label for="category_id">Category</label>

            <select name="category_id" class="form-control border border-primary w-75" >
                @foreach ($categories as $category)
                        <option value="{{$category->id}} "> {{$category->name}} </option>
                @endforeach
            </select>

        </div>  
        

        <div class="form-group">
            <label for="photo_id">Photo</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="photo_id" >
                <label class="custom-file-label border border-primary w-75" for="photo_id">Choose file...</label>
            </div>
        </div>      
    
        <div class="form-group">
            <input type="submit" value="Create" class="btn btn-primary">
        </div>
    </form>

@endsection