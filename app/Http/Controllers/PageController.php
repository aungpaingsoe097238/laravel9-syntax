<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public $recentPosts;

    public function __construct()
    {
        $this->recentPosts = Post::limit(5)->get();
    }

    public function index(){

        $posts = Post::search()
            ->latest('id')
            ->paginate(10)
            ->withQueryString(); // paginate လုပ်ရင် search keyword ပါပြန်ခေါ်ပေး။

        $recentPosts = $this->recentPosts;

        return view('index',compact('posts','recentPosts'));
    }

    public function detail($slug){

        $post = Post::where('slug',$slug)->first();

        $recentPosts = $this->recentPosts;

        return view('detail',compact('post','recentPosts'));
    }

    public function postByCategory($slug){

        $category = Category::where('slug',$slug)->first();

        $category_id = $category->id;

        $posts = Post::where(function ($query){
            $query->when(request('keyword'),function ($query) {
                $keyword = request('keyword');
                $query->where('title', "LIKE", "%$keyword%")
                    ->orWhere('description', "LIKE", "%$keyword%");
            });
        })
            ->where('category_id',$category_id)
            ->latest('id')
            ->paginate(10)
            ->withQueryString(); // paginate လုပ်ရင် search keyword ပါပြန်ခေါ်ပေး။

        $recentPosts = $this->recentPosts;

        return view('index',compact('posts','category','recentPosts'));

    }

}
