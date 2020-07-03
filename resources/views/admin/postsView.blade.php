@extends('layouts.admin')


@section('content')

    @if ($posts)
        @foreach ($posts as $post)
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class=" col-sm-3 mb-3">
                        <img   class="rounded-circle mw-100 mh-100"  src="/images/{{$post->photo->path}} " alt="">
                    </div>
                    <div class="col-sm-9 mt-2">  
                            <p class="h5">{{$post->title}}</small> 
                            <p class="lead">{{$post->body}} Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo, laudantium alias vel at eaque placeat deleniti architecto aspernatur delectus ducimus, dolor atque tempore nisi quas officiis non ea neque recusandae! </p>
                            
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    @endif



  
  @endsection