@extends('layouts.admin')


@section('content')
    <h1>create post</h1>

    <form method="POST"  action="{{route('posts.store')}} " enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title">Title</label>
            <input  class="form-control border border-primary  w-75 @error('title') is-invalid @enderror" type="text" name="title" >
            @error('title')
            <div class="invalid-feedback">{{$message}} </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="body">Body</label>
            <textarea cols="30" rows="10" class="form-control border border-primary  w-75 @error('body') is-invalid @enderror"  type="text" name="body" ></textarea>
                @error('body')
                    <div class="invalid-feedback">{{$message}} </div>
                @enderror
        </div>

        <div class="form-group">
            <label for="category_id">Category</label>
            <select name="category_id" class="form-control border border-primary w-75" >
                <option value="">select category</option>
            </select>
        </div>

        <div class="form-group">
            <label for="photo_id">Photo</label>
            <input class="form-control-file"  type="file" name="photo_id" >
        </div>      

        <div class="form-group">
            <input type="submit" value="Create" class="btn btn-primary">
        </div>
    </form>

@endsection