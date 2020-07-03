<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //

    protected $fillable = ['path'];


    public function user(){
        return $this->hasOne(User::class);
    }

    public function post(){
        return $this->hasOne(Post::class);
    }
}
