<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\ShopController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;

use App\Models\Project;
use App\Models\Product;
use App\Models\Category;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/setlocale/{locale}', function($locale) {
   session(['locale' => $locale]);
   return redirect()->back();
});

Route::get('/cart', [ShopController::class, 'cart'])->middleware('auth'); 
Route::get('/category/{id}', [ShopController::class, 'category_show']);

Route::get('/contact', function () {
    if(session()->has('locale')) {
    
        $locale = session('locale');
        App::setLocale($locale);
    }
    else {
        $locale = session(['locale' => 'ru']);
        App::setLocale('ru');
}
    return view('contact');
});

Route::get('/guarange', [MainController::class, 'guarange']);

Route::get('/office', [ShopController::class, 'office'])->middleware('auth');

Route::get('/pageproject', function () {
    if(session()->has('locale')) {
    
        $locale = session('locale');
        App::setLocale($locale);
    }
    else {
        $locale = session(['locale' => 'ru']);
        App::setLocale('ru');
}
    return view('pageproject');
});

Route::get('/product', function () {
    if(session()->has('locale')) {
    
        $locale = session('locale');
        App::setLocale($locale);
    }
    else {
        $locale = session(['locale' => 'ru']);
        App::setLocale('ru');
}
    return view('product');
});

Route::get('/currency/{currency}', [ShopController::class, 'currency_change']);

Route::get('/projects', [MainController::class, 'projects']);

Route::post('/callback', [MainController::class, 'callback']);

Route::post('/consultation', [MainController::class, 'consultation']);

Route::get('/project/{id}', [MainController::class, 'pageproject']);

Route::get('/blog',  [MainController::class, 'blog']);
Route::get('/blog/{id}',  [MainController::class, 'blog_show']);

Route::get('/', [MainController::class, 'index']);

Route::get('/company', [MainController::class, 'company']);

Route::get('/delivery', [MainController::class, 'delivery']);

Route::get('/partner', [MainController::class, 'partners']);

Route::get('/team', [MainController::class, 'team']);

Route::get('/subcategory/{id}', [ShopController::class, 'card']);

Route::get('/product/{id}', [ShopController::class, 'card_detail']);

Route::post('/cart-add', [ShopController::class, 'cart_add'])->middleware('auth');
Route::post('/cart-remove', [ShopController::class, 'cart_remove']);

Route::post('/add-order', [ShopController::class, 'add_order'])->middleware('auth');
Route::post('/password_change', [UserController::class, 'password_change'])->middleware('auth');

Route::get('/calc', [MainController::class, 'calculator']);
Route::post('/calculator/calculation', [MainController::class, 'calculation']);


Route::post('/request', function(Request $request) {
    if(session()->has('locale')) {
    
        $locale = session('locale');
        App::setLocale($locale);
    }
    else {
        $locale = session(['locale' => 'ru']);
        App::setLocale('ru');
    }

    $data = $request->validate([
        'fullname' => ['required', 'filled', 'string'],
        'number'   => ['required', 'filled', 'string'],
        'email'    => ['required', 'filled', 'email']
    ]);

    Mail::send(['text' => 'email'], compact('data'), function ($m) {
        $m->subject('Заявка на "ПОДОБРАТЬ СИСТЕМУ"');
        $m->from('john@johndoe.com', 'Laravel App');
        $m->to('info@ftgco.kz');
    });

    return redirect()->back()->with('contact', 'contact');
});


Route::get('/search', function() {
    if(session()->has('locale')) {
    
        $locale = session('locale');
        App::setLocale($locale);
    }
    else {
        $locale = session(['locale' => 'ru']);
        App::setLocale('ru');
}
    $products = Product::all()->translate(session('locale'));
    $q = null;
    return view('search', compact('products', 'q'));
});

Route::post('/search', function(Request $request) {
    if(session()->has('locale')) {
    
        $locale = session('locale');
        App::setLocale($locale);
    }
    else {
        $locale = session(['locale' => 'ru']);
        App::setLocale('ru');
}

    $q = $request->q;
    $products = Product::where('name', 'like', '%'.$q .'%')->get()->translate(session('locale'));
    return view('search', compact('products', 'q'));
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/dashboard', function () {
    if(session()->has('locale')) {
    
        $locale = session('locale');
        App::setLocale($locale);
    }
    else {
        $locale = session(['locale' => 'ru']);
        App::setLocale('ru');
}

    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
