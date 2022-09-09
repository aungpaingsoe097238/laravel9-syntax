<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use function Spatie\Ignition\renderError;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::when(isset(request()->keyword),function ($query) {
            $keyword = request()->keyword;
            $query->where('title', "LIKE", "%$keyword%")
                ->orWhere('description', "LIKE", "%$keyword%");
        })
            ->when(Auth::user()->isAuthor(),fn($q)=>$q->where('user_id',Auth::user()->id))
            ->when(request()->trash,fn($q)=>$q->onlyTrashed())
            ->with(['category','user'])
            ->latest('id')
            ->paginate(10)
            ->withQueryString(); // paginate လုပ်ရင် search keyword ပါပြန်ခေါ်ပေး။

        return view('post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $links = ['Post'=>route('post.index'),'Post Create'=>route('post.create')];

        return view('post.create',compact('links'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->description = $request->description;
        $post->excerpt = Str::words(50,$request->description,' .....');
        $post->category_id = $request->category;
        $post->user_id = Auth::id();

        if($request->hasFile('featured_image')){
            $newName = uniqid().'_featured_image.'.$request->file('featured_image')->extension();
            $request->file('featured_image')->storeAs('public',$newName);
            $post->featured_image = $newName;
        }

        $post->save();

        $savePhotos = [];
        foreach ($request->photos as $key=>$photo){
            $newName = uniqid().'_photo.'.$photo->extension();
            $photo->storeAs('public',$newName);
            $savePhotos[$key] = [
                'post_id' => $post->id,
                'name'    => $newName
            ];
        }

        Photo::insert($savePhotos);

//        $photos = new Photo();
//        $photos->post_id = $post->id;
//        $photos->name = $newName;
//        $photos->save();

        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
//        return $post->user;
        return view('post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('post.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
//        if(Gate::denies('update-post',$post)){
//            return abort(403,"Not Allow");
//        }

//        if(Gate::denies('update',$post)){
//            return abort(403);
//        }

        Gate::authorize('update',$post);


        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->description = $request->description;
        $post->excerpt = Str::words(50,$request->description,' .....');
        $post->category_id = $request->category;
        $post->user_id = Auth::id();

        if($request->hasFile('featured_image')){
            // Delete Old File
            Storage::delete('public/'.$post->feature_image);
            // Update New File
            $newName = uniqid().'_featured_image.'.$request->file('featured_image')->extension();
            $request->file('featured_image')->storeAs('public',$newName);
            $post->featured_image = $newName;
        }

        $post->save();

        $savePhotos = [];
        if($request->photos){
            foreach ($request->photos as $key=>$photo){
                $newName = uniqid().'_photo.'.$photo->extension();
                $photo->storeAs('public',$newName);
                $savePhotos[$key] = [
                    'post_id' => $post->id,
                    'name'    => $newName
                ];
            }
        }

        Photo::insert($savePhotos);

//        $photos = new Photo();
//        $photos->post_id = $post->id;
//        $photos->name = $newName;
//        $photos->save();

        return redirect()->route('post.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::withTrashed()->findOrFail($id)->first();
        Gate::authorize('delete',$post);

        if(isset($post->featured_image)){
            Storage::delete('public/'.$post->featured_image);
        }

        foreach ($post->photos as $photo){
            Storage::delete('public/'.$photo->name);
            $photo->delete();
        }

        if (request()->delete === 'force'):
            Post::withTrashed()->findOrFail($id)->forceDelete();
        elseif (request()->delete === 'restore'):
            Post::withTrashed()->findOrFail($id)->restore();
        else:
            Post::withTrashed()->findOrFail($id)->delete(); // Soft Delete
        endif;

        return redirect()->route('post.index',['trash'=>true]);
    }
}
