@extends('layouts.blog-post')



@section('content')

<h1 class="text-center mt-4 text-secondary">Blog Posts</h1>
@if ($post)
<!-- Author -->

<!-- Date/Time -->
<div class="mt-5 pt-2">
    <p>Posted By <span class="font-weight-bold text-capitalize">{{$post->user->name}} </span> {{$post->created_at->diffForHumans()}} </p>

</div>
<hr>

<div class="card mt-4 bg-white">
    <div class="card-header py-5">
        <div class="row">
            <div class=" col-sm-3 mt-3">
                <img   class="rounded mw-100 mh-100"  src="/images/{{$post->photo->path}} " alt="">
            </div>
            <div class="col-sm-9 mt-2">  
                    <p class="h5">{{$post->title}}</small> 
                    <p class="lead">{{$post->body}} Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo, laudantium alias vel at eaque placeat deleniti architecto aspernatur delectus ducimus, dolor atque tempore nisi quas officiis non ea neque recusandae! </p>
            </div>
        </div>
    </div>
</div>    
{{-- comment form --}}
<div class="card  mb-5">
    <div class="card-body">
      <form method="POST" action=" {{route('comments.store')}} ">
        @csrf
        
        <input type="hidden" name="post_id" value=" {{$post->id}}  ">
        <div class="input-group mb-3">
            <input type="text" name="body" class="form-control" placeholder="leave your comment">
            <div class="input-group-append">
              <button class="btn btn-outline-secondary" type="submit"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
            </div>
          </div>
      </form>
      @if (Session::get('approval'))
        
        <p class="text-success text-wieght-bold"> {{Session::get('approval')}} </p>
         
      @endif
   <!-- Comment with nested comments -->
   {{-- check if there is a comment --}}
      @if ($post->comments )
      {{-- looping through comments --}}
      @foreach ($post->comments as $comment)
      {{-- return active (allowable) comments --}}
        @if ($comment->is_active == 1)
        <div class="media mb-4">
          <img width="50" height="50" class="d-flex mr-3 rounded-circle" src="/images/{{$comment->user->photo ?$comment->user->photo->path : 'avarar.png'}} ">
          <div class="media-body">
              <h5 class="mt-0"> {{$comment->user->name}} <small>{{$comment->created_at->diffForHumans()}} </small> </h5>
              {{$comment->body}}
              {{-- reply form  --}}
              <form method="POST" action=" {{route('replies.store')}} " class="my-2">
                @csrf
                
                <input type="hidden" name="comment_id" value=" {{$comment->id}} ">
                <div class="input-group mb-3">
                    <input type="text" name="body" class="form-control" placeholder="Reply to comment">
                    <div class="input-group-append">
                      <button class="btn btn-outline-secondary" type="submit"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                    </div>
                  </div>
              </form>
              {{-- reply form end  --}}

              {{-- check for replies --}}
              @if ($comment->replies)
              {{-- loop throught replies --}}
              @foreach ($comment->replies as $reply)
              @if ($reply->is_active == 1)
                  {{-- view reply --}}
                  <div class="media mt-4">
                    <img width="50" height="50" class="d-flex mr-3 rounded-circle" src="/images/{{$reply->user->photo ? $reply->user->photo->path : 'avarar.png'}} " alt="">
                    <div class="media-body">
                    <h5 class="mt-0">{{$reply->user->name}} <small> {{$reply->created_at->diffForHumans()}} </small> </h5>
                      {{$reply->body}}      
                    </div>
                  </div> 
                  @if (Session::get('approval'))
                      <p class="text-success">{{Session::get('approval')}} </p>
                  @endif
                  {{-- view reply end --}} 
              @endif
              @endforeach
              @endif
              {{-- check for replies end--}}
          </div>
        </div>   
        @endif
      @endforeach
      @endif



    </div>
  </div>
@endif

        {{-- <!-- Title -->
        <h1 class="mt-4">Post Title</h1>

        <!-- Author -->
        <p class="lead">
          by
          <a href="#">Start Bootstrap</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p>Posted on January 1, 2019 at 12:00 PM</p>

        <hr>

        <!-- Preview Image -->
        <img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">

        <hr>

        <!-- Post Content -->
        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?</p>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, tenetur natus doloremque laborum quos iste ipsum rerum obcaecati impedit odit illo dolorum ab tempora nihil dicta earum fugiat. Temporibus, voluptatibus.</p>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, doloribus, dolorem iusto blanditiis unde eius illum consequuntur neque dicta incidunt ullam ea hic porro optio ratione repellat perspiciatis. Enim, iure!</p>

        <blockquote class="blockquote">
          <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
          <footer class="blockquote-footer">Someone famous in
            <cite title="Source Title">Source Title</cite>
          </footer>
        </blockquote>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, nostrum, aliquid, animi, ut quas placeat totam sunt tempora commodi nihil ullam alias modi dicta saepe minima ab quo voluptatem obcaecati?</p>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dolor quis. Sunt, ut, explicabo, aliquam tenetur ratione tempore quidem voluptates cupiditate voluptas illo saepe quaerat numquam recusandae? Qui, necessitatibus, est!</p>

        <hr>

        <!-- Comments Form -->
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
            <form>
              <div class="form-group">
                <textarea class="form-control" rows="3"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>

        <!-- Single Comment -->
        <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0">Commenter Name</h5>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
          </div>
        </div>

        <!-- Comment with nested comments -->
        <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0">Commenter Name</h5>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

            <div class="media mt-4">
              <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
              <div class="media-body">
                <h5 class="mt-0">Commenter Name</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
              </div>
            </div>

            <div class="media mt-4">
              <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
              <div class="media-body">
                <h5 class="mt-0">Commenter Name</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
              </div>
            </div>

          </div>
        </div> --}}

@endsection