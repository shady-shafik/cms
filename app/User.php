<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password' , 'role_id' , 'photo_id','is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function role()
    {
        return $this->belongsTo('App\Role');
    }


    public function photo(){
        return $this->belongsTo(Photo::class);
    }


    public function isAdmin(){

        if($this->role){
            if($this->role->name == 'admin' && $this->is_active == 1){
                return true;
            }
        }
        return false;
    }


    public function post(){
        return $this->hasMany(Post::class);
    }


    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function replies(){
        return $this->hasMany(CommentReply::class);
    }
}
