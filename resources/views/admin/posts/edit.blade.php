@extends('layouts.admin')


@section('content')
    <h1>Edit post</h1>

    <div class="row">

    <div class="col-sm-3 text-center">
        <img 
        height="150" width="200" 
        src=" /images/{{$post->photo ? $post->photo->path : 'avarar.png'}} " 
        class="rounded"
        >

    {{-- delete post form --}}
    <form class="mt-5" method="POST" action=" {{route('posts.destroy' , $post->id)}} "> 
        @csrf
        @method('DELETE')
            <div class="form-group">         
                <input type="submit" value="Delete" class="btn btn-danger">
            </div>
    </form>
    {{-- delete post form end  --}}
    </div>

    <div class="col-sm-9">

    <form method="POST"  action="{{route('posts.update' , $post->id )}} " enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>
            <input value=" {{$post->title}} " class="form-control border border-primary  w-75 @error('title') is-invalid @enderror" type="text" name="title">
            @error('title')
            <div class="invalid-feedback">{{$message}} </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="body">Body</label>
            <textarea  cols="30" rows="10" class=" border border-primary  w-75 form-control @error('body') is-invalid @enderror"  type="text" name="body" >{{$post->body}}</textarea>
                @error('body')
                    <div class="invalid-feedback">{{$message}} </div>
                @enderror
        </div>

        <div class="form-group">
            <label for="category_id">Category</label>

            <select name="category_id" class="form-control border border-primary w-75" >
                @if ($categories)
                        
                    @foreach ($categories as $category)
                            <option value="{{$category->id}} "> {{$category->name}} </option>
                    @endforeach

                @endif

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
    </div>
    </div>
@endsection