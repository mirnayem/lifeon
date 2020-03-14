<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{   
    
    protected $table = 'categories';
    
    protected $hidden = ["pivot"];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
