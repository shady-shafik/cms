@extends('layouts.admin')



@section('content')

@if (Session::get('deleted'))
    <p class="alert alert-success"> {{Session::get('deleted')}} </p>
@endif
    @if (count($comments) > 0)
    <h1>Comments</h1>

        <table class="table table-hover table-bordered text-center mt-4 ">
            <thead>
                <tr>

                    <th scope="col"> Commented by</th>
                    <th scope="col"> Comment </th>
                    <th scope="col">Active</th>
                    <th scope="col"> Post owner </th>
                    <th scope="col">Approve</th>
                    <th scope="col">Delete</th>
                    <th scope="col">View post</th>


                </tr>
            </thead>       
             @foreach ($comments as $comment)
                <tbody>
                    <tr>
                        <td> {{$comment->user->name}} </td>
                        <td> {{$comment->body}} </td>
                        <td> {{$comment->is_active == 1 ? 'Active': 'Not Active'}} </td>
                        <td> {{$comment->post->user->name}}  </td>
                        {{-- Approve comment form  --}}
                        <td>
                        
                            @if ($comment->is_active == 1)
                            <form method="POST" action=" {{route('comments.update' , $comment->id)}} ">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="is_active" value="0">
                                <button type="submit" class="btn btn-outline-secondary btn-sm">Un Approve</button>
                            </form>  
                            @else
                            <form method="POST" action=" {{route('comments.update' , $comment->id)}} ">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="is_active" value="1">
                                <button type="submit" class="btn btn-outline-dark btn-sm">Approve</button>
                            </form>  
                            @endif
                        
                        </td>

                        {{-- Delete comment form --}}

                        <td>
                            
                            <form  method="POST" action=" {{route('comments.destroy' , $comment->id)}} ">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm">Delete </button>
                            </form>
                        </td>

                        <td><a href="{{route('home.post' , $comment->post->id )}} ">View</a></td>
                    </tr>
                </tbody>
            @endforeach       
        </table>        
    @else
        <h1 class="text-center">there are no comments</h1>
    @endif




@endsection 