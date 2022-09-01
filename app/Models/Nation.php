<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nation extends Model
{
    use HasFactory;

    public function posts(){
        return $this->hasManyThrough(Post::class,User::class);
    }

    public function categories(){
        return $this->hasManyThrough(Category::class,User::class);
    }
}
