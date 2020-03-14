<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';

    protected $hidden = ['pivot'];
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
