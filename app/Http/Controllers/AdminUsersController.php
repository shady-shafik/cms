<?php

namespace App\Http\Controllers;
use App\User;
use App\Role;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        //
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
        //
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
