<?php

namespace App\Http\Controllers;
use App\User;
use App\Role;
use App\Photo;
use Illuminate\Http\Request;
class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin.users.index' , compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

       return  view('admin.users.create');
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
            'name' => 'required|min:5',
            'email' => 'required',
            'password' => 'required|min:8',
            'is_active' => 'required'
        ]);  
        

         $input = $request->all();

        if ($file = $request->file('photo_id')) {
            
           $name  = time() .$file->getClientOriginalName();

           $file->move('images' ,$name);

            $photo = Photo::create(['path' => $name]);

            $input['photo_id'] = $photo->id;

        }

      
        $input['password'] = bcrypt($input['password']); 



        User::create($input);

        return  redirect('admin/users');

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
        $user = User::findOrFail($id);

        return view('admin.users.edit' , compact('user'));
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
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required',
            'password' => 'required|min:8',
            'is_active' => 'required'
        ]);  
         
        $user = User::findOrFail($id);
        $update = $request->all();

            //extract not required element
            ! $request['photo_id'] 
            ? 
             $update = collect($update)->except(['_method' , 'photo_id'])->toArray() 
            :
             $update = collect($update)->except(['_method'])->toArray();


        if( $file = $request->file('photo_id')){

            $name = time() . $file->getClientOriginalName();

            $file->move('images' , $name);

            //check if there is a photo or not
            
                $photo = Photo::create(['path' => $name]);

                $update['photo_id'] = $photo->id; 

        }

        //encrypt password
        $update['password'] = bcrypt($update['password']); 

        //update data
        $user->update($update);
        
        return  redirect('admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
