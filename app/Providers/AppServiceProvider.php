<?php

namespace App\Providers;

use App\Category;
use App\Post;
use App\Tag;
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
        view()->composer('*', function ($view) {
            $view->with('posts', Post::all())->with( 'categories' , Category::all())->with('allposts', Post::paginate(14))->with('tags', Tag::all())
                 ->with('archives', Post::selectRaw("year(created_at) year, monthname(created_at)  month ")->groupBy("year", "month")->orderByRaw("min(created_at) desc")->get()->toArray());
        });
    }
}
