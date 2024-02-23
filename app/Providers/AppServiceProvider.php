<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();

        // Categories globally shared to all views
        View::share('categories', Category::all());

        // Latest Post shared to all views
        $latestPosts = Post::latest()->take(3)->get();
        View::share('latestPosts' , $latestPosts);

        // tags who has post
        $tags =  Tag::whereHas('posts')
                    ->withCount('posts')
                    ->orderBy('posts_count' , "DESC")
                    ->limit(12)
                    ->get();

        View::share('sidebarTags' , $tags);
    }
}
