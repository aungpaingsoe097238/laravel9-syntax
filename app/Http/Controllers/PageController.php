<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{

    public function index(){
        $posts = Post::when(isset(request()->keyword),function ($query) {
            $keyword = request()->keyword;
            $query->where('title', "LIKE", "%$keyword%")
                ->orWhere('description', "LIKE", "%$keyword%");
        })
            ->with(['category','user'])
            ->latest('id')
            ->paginate(10)
            ->withQueryString(); // paginate လုပ်ရင် search keyword ပါပြန်ခေါ်ပေး။

        return view('index',compact('posts'));
    }

    public function detail($slug){

        $post = Post::where('slug',$slug)->with('category','user')->first();

        return view('detail',compact('post'));
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
            ->with(['user','category'])
            ->latest('id')
            ->paginate(10)
            ->withQueryString(); // paginate လုပ်ရင် search keyword ပါပြန်ခေါ်ပေး။

        return view('index',compact('posts','category'));

    }

}
