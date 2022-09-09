<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $with = [
        'category',
        'user',
        'photos'
    ];

    // Accessor
    public function getTitleAttribute($value)
    {
        return ucfirst($value);
    }

    // Mutator
    public function setTitleAttribute($value){
        return $this->attributes['title'] = strtoupper($value);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function photos(){
        return $this->hasMany(Photo::class);
    }

    public function scopeSearch($quary){
        return $quary->when(isset(request()->keyword),function ($q) {
            $keyword = request()->keyword;
            $q->where('title', "LIKE", "%$keyword%")
                ->orWhere('description', "LIKE", "%$keyword%");
        });
    }

}
