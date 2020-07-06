<?php

namespace App\Http\Controllers;
use App\Photo;
use App\Post;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
       
        return view('admin.posts.index' , compact('posts'));    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create' , compact('categories'));
   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body'  => 'required',
        ]);

        $user = Auth::user();

        $input = $request->all();

        if( $file = $request->file('photo_id')){

            $name = time() .$file->getClientOriginalName();

            $file->move('images' , $name);

            $photo  =  Photo::create(['path' => $name]);

            $input['photo_id'] = $photo->id;
        }

         $user->post()->create($input);


         return redirect('admin/posts');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post  = Post::findOrFail($id);

        $categories =  Category::all() ;
        return view('admin.posts.edit' , compact('post' , 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $input = collect($request->all())->except(['_method' , 'photo_id'])->toArray();


       if( $file = $request->file('photo_id')){

            $name = time() . $file->getClientOriginalName();

            $file->move('images' , $name);

            $photo =  Photo::create(['path' => $name]);

            $input['photo_id'] = $photo->id;
       }

        $post->update($input);

        return redirect('admin/posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request , $id)
    {

        $post  = Post::findOrFail($id);

        if ($post->photo) {

            unlink(public_path().   '/images/' . $post->photo->path);
        }

        $post->delete();

        $request->session()->flash('deleted' , 'post has been deleted');
       return redirect('admin/posts');
    }


    public function post($id){
        
        $post = Post::findOrFail($id);
        
        return view('post' , compact('post'));
    }
}
