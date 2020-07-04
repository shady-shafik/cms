<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = [
        'title',
        'body',
        'photo_id',
        'user_id',
        'category_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function photo(){
        return $this->belongsTo(Photo::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
