<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function roles () {
        return $this->belongsToMany('\App\Role');
    }
    
    public function author () {
        return $this->belongsTo('\App\User', 'author_id');
    }
}
