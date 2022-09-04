<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFive();

//        view Share သည် view တိုင်းကို data ပို့ပေးတဲ့အတွက် မလုံချုံပါဘူး။
//        မလိုအပ်တဲ့ query တွေလည်းများစွာ run ပါတယ်။
//        View::share('categories',Category::latest('id')->get());

//        View Composer
            View::composer(
                [
                    'index',
                    'detail',
                    'post.create',
                    'post.edit'
                ],
                fn(\Illuminate\View\View $view)=> $view->with('categories',Category::latest('id')->get())
            );


//        Blade::directive('myname',function ($x){
//            return 'Aung Paing Soe'.$x;
//        });
//
//        Blade::if('abc',function($x){
//            return $x;
//        });

        Blade::if('admin',function(){
            return Auth::user()->role == 'admin';
        });

        Blade::if('notAuthor',function (){
            return Auth::user()->role != 'author';
        });

        Blade::if('trash',function (){
            return request()->trash;
        });
    }
}
