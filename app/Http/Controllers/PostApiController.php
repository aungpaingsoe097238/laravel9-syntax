<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostApiController extends Controller
{
    public function posts(){
        $posts = Post::search()
            ->latest('id')
            ->paginate(10)
            ->withQueryString(); // paginate လုပ်ရင် search keyword ပါပြန်ခေါ်ပေး။

        return response()->json($posts);
    }

    public function detail($slug){

        $post = Post::where('slug',$slug)->with('category','user')->first();

        return response()->json($post);
    }
}
