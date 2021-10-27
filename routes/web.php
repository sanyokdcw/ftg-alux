<?php

use App\Models\Product;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;

use Spatie\Sitemap\SitemapGenerator;
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

Route::middleware('checkCurrencies')->group(function () {
    Route::get('/cart', [ShopController::class, 'cart']);
    Route::get('/category/{slug}', [ShopController::class, 'category_show']);

    Route::get('/contact', function () {
        if (session()->has('locale')) {

            $locale = session('locale');
            App::setLocale($locale);
        } else {
            $locale = session(['locale' => 'ru']);
            App::setLocale('ru');
        }
        return view('contact');
    });

    Route::get('/guarange', [MainController::class, 'guarange']);

    Route::get('/office', [ShopController::class, 'office'])->middleware('auth');

    Route::get('/pageproject', function () {
        if (session()->has('locale')) {

            $locale = session('locale');
            App::setLocale($locale);
        } else {
            $locale = session(['locale' => 'ru']);
            App::setLocale('ru');
        }
        return view('pageproject');
    });

    Route::get('/product', function () {
        if (session()->has('locale')) {

            $locale = session('locale');
            App::setLocale($locale);
        } else {
            $locale = session(['locale' => 'ru']);
            App::setLocale('ru');
        }
        return view('product');
    });

    Route::get('/currency/{currency}', [ShopController::class, 'currency_change']);

    Route::get('/projects', [MainController::class, 'projects']);

    Route::post('/callback', [MailController::class, 'call']);
    Route::post('/office-mail', [MailController::class, 'office']);

    Route::post('/consultation', [MainController::class, 'consultation']);

    Route::get('/project/{slug}', [MainController::class, 'pageproject']);

    Route::get('/blog', [MainController::class, 'blog']);
    Route::get('/blog/{slug}', [MainController::class, 'blog_show']);

    Route::get('/', [MainController::class, 'index']);

    Route::get('/company', [MainController::class, 'company']);

    Route::get('/delivery', [MainController::class, 'delivery']);

    Route::get('/partner', [MainController::class, 'partners']);

    Route::get('/team', [MainController::class, 'team']);

    Route::get('/subcategory/{slug}', [ShopController::class, 'card']);

    Route::get('/product/{slug}', [ShopController::class, 'card_detail']);

    Route::post('/cart-add', [ShopController::class, 'cart_add']);
    Route::post('/cart-remove', [ShopController::class, 'cart_remove']);

    Route::post('/add-order', [ShopController::class, 'add_order'])->middleware('auth');
    Route::post('/add-guest-order', [ShopController::class, 'add_guest_order']);
    Route::post('/password_change', [UserController::class, 'password_change'])->middleware('auth');

    Route::get('/calc', [MainController::class, 'calculator']);
    Route::post('/calculator/calculation', [MainController::class, 'calculation']);


    Route::post('/request', [MailController::class, 'send']);

    Route::get('/search', function () {
        if (session()->has('locale')) {

            $locale = session('locale');
            App::setLocale($locale);
        } else {
            $locale = session(['locale' => 'ru']);
            App::setLocale('ru');
        }
        $products = Product::all()->translate(session('locale'));
        $q = null;
        return view('search', compact('products', 'q'));
    });

    Route::post('/search', function (Request $request) {
        if (session()->has('locale')) {

            $locale = session('locale');
            App::setLocale($locale);
        } else {
            $locale = session(['locale' => 'ru']);
            App::setLocale('ru');
        }

        $q = $request->q;
        $products = Product::where('name', 'like', '%' . $q . '%')->get()->translate(session('locale'));
        return view('search', compact('products', 'q'));
    });

    Route::post('/send-product-email', function (Request $request) {
        dd($request->all());
    });

    Route::group(['prefix' => 'admin'], function () {
        Voyager::routes();
    });

    Route::get('/dashboard', function () {
        if (session()->has('locale')) {

            $locale = session('locale');
            App::setLocale($locale);
        } else {
            $locale = session(['locale' => 'ru']);
            App::setLocale('ru');
        }

        return view('dashboard');
    })->middleware(['auth'])->name('dashboard');
});

// Route::get('sitemap', function(){
//     SitemapGenerator::create('https://ftg.kz/')->writeToFile('sitemap.xml');
// });

    Route::get('/sitemap', function() {
        return view('.public.sitemap.xml');
    });

require __DIR__.'/auth.php';
