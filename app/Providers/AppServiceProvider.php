<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Post;

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
        $footers = Post::with('user:id,name,avatar')->orderBy('created_at', 'DESC')->limit(9)->get();
        view()->share('footers', $footers);
    }
}
 