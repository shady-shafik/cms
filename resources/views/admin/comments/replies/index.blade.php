@extends('layouts.admin')



@section('content')

@if (Session::get('deleted'))
    <p class="alert alert-success"> {{Session::get('deleted')}} </p>
@endif
    @if (count($replies) > 0)
    <h1>Replies</h1>

        <table class="table table-hover table-bordered text-center mt-4 ">
            <thead>
                <tr>

                    <th scope="col"> Replied by</th>
                    <th scope="col"> Reply </th>
                    <th scope="col">Active</th>
                    <th scope="col"> Comment owner </th>
                    <th scope="col">Approve</th>
                    <th scope="col">Delete</th>
                    <th scope="col">View post</th>


                </tr>
            </thead>       
             @foreach ($replies as $reply)
                <tbody>
                    <tr>
                        <td> {{$reply->user->name}} </td>
                        <td> {{$reply->body}} </td>
                        <td> {{$reply->is_active == 1 ? 'Active': 'Not Active'}} </td>
                        <td> {{$reply->comment->user->name}}  </td>
                        {{-- Approve comment form  --}}
                        <td>
                        
                            @if ($reply->is_active == 1)
                            <form method="POST" action=" {{route('replies.update' , $reply->id)}} ">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="is_active" value="0">
                                <button type="submit" class="btn btn-outline-secondary btn-sm">Un Approve</button>
                            </form>  
                            @else
                            <form method="POST" action=" {{route('replies.update' , $reply->id)}} ">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="is_active" value="1">
                                <button type="submit" class="btn btn-outline-dark btn-sm">Approve</button>
                            </form>  
                            @endif
                        
                        </td>

                        {{-- Delete comment form --}}

                        <td>
                            
                            <form  method="POST" action=" {{route('replies.destroy' , $reply->id)}} ">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm">Delete </button>
                            </form>
                        </td>

                        <td><a href="{{route('home.post' , $reply->comment->post->id )}} ">View</a></td>
                    </tr>
                </tbody>
            @endforeach       
        </table>        
    @else
        <h1 class="text-center">there are no comments</h1>
    @endif




@endsection 