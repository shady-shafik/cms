@extends('layouts.admin')



@section('content')
<h1>Edit category</h1>
    <div class="col-sm-12 col-md-8 mx-auto mt-5">
        <form method="POST" action="{{route('categories.update' , $category->id)}} ">
            @csrf
            @method('PUT')
            <div class="form-group">
                <input type="text" name="name" value="{{ $category->name }}" 
                class="form-control border border-primary ">
            </div>

            <div class="form-group">
                <input type="submit" value="submit" class="btn btn-primary">
            </div>
        </form>
    </div>
@endsection