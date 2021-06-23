<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Cart;
use App\Models\Social;

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
        $categories = Category::where('available', 1)->orderBy('order', 'asc')->get();
        foreach($categories as $category){
            $category->subcategories = Subcategory::where('category_id', $category->id)->where('available', 1)->orderBy('order', 'asc')->get();
        }
        $socials = Social::all();
        View::share('categories', $categories);
        View::share('socials', $socials);
        
    }
}
