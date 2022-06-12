<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DarkModeController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\SubcategoryController;
use App\Http\Controllers\Dashboard\ItemController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\SearchController;
use App\Http\Controllers\Site\SiteController;

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
Route::get('/', function(){
    if (Auth::check()) {
        return redirect('/admin');
    }
    else
    {
        return redirect('/home');
    }
});

// Start of Admin Dashboard routes
Route::get('dark-mode-switcher', [DarkModeController::class, 'switch'])->name('dark-mode-switcher');

Route::middleware('loggedin')->group(function() {
    Route::get('login', [AuthController::class, 'loginView'])->name('login-view');
    Route::post('login', [AuthController::class, 'login'])->name('login');
});

Route::prefix('admin')->group( function() {
    Route::middleware('auth')->group( function () {

        // Start Of Dashboard Routes
        Route::get('login-page', [PageController::class, 'login'])->name('login');
        Route::get('logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('searchresults', [SearchController::class, 'search'])->name('dashboard.search');
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
        // End Of Dashboard Routes


        // Start Of Users routes
        Route::controller(UserController::class)->group(function () {
            Route::get('/users', 'index')->name('user.index');
            Route::get('/users/trashed', 'usersTrashed')->name('user.trashed');
            Route::get('/user/{id}', 'show')->name('user.show');
            Route::get('/users/create', 'create')->name('user.create');
            Route::post('/user', 'store')->name('user.store');
            Route::get('/user/edit/{id}', 'edit')->name('user.edit');
            Route::put('/user/{id}', 'update')->name('user.update');
            Route::delete('/users/{id}', 'destroy')->name('user.destroy');
            Route::delete('/user/hdelete/{id}', 'hdelete')->name('user.hdelete');
            Route::get('/user/resotre/{id}', 'restore')->name('user.restore');
        });
        // End Of Users routes

        // Start Of Roles & Permissions routes

        Route::get('/laratrust', function(){
            if((Auth::user())->hasRole('admin')){
                return redirect('/laratrust');
            } else {
                return view('dashboard.permission_denied');
            }
        })->name('laratrust');
        // End Of Roles & Permissions routes

        // Start Of Category routes
        Route::controller(Dashboard\CategoryController::class)->group(function () {
            Route::get('/categories', 'index')->name('category.index');
            Route::get('/category/create', 'create')->name('category.create');
            Route::post('/category', 'store')->name('category.store');
            Route::get('/category/{id}/edit', 'edit')->name('category.edit');
            Route::put('/category/{id}', 'update')->name('category.update');
            Route::delete('/category/{id}', 'destroy')->name('category.destroy');
            Route::get('/category/export', 'export')->name('category.export');
        });
        // End Of Category routes


        // Start Of Subcategory routes
        Route::controller(Dashboard\SubcategoryController::class)->group(function () {
            Route::get('/subcategories', 'index')->name('subcategory.index');
            Route::get('/Subcategory/create', 'create')->name('subcategory.create');
            Route::post('/Subcategory', 'store')->name('subcategory.store');
            Route::get('/Subcategory/{id}/edit', 'edit')->name('subcategory.edit');
            Route::put('/Subcategory/{id}', 'update')->name('subcategory.update');
            Route::delete('/Subcategory/{id}', 'destroy')->name('subcategory.destroy');
            Route::get('/Subcategory/export', 'export')->name('subcategory.export');
            Route::get('/Subcategory/export/{id}', 'exportItems')->name('subcategory.exportItems');

        });
        // End Of Subcategory routes

        // Start Of Item routes
        Route::controller(Dashboard\ItemController::class)->group(function () {
            Route::get('/items', 'index')->name('item.index');
            Route::get('/items/trashed', 'itemsTrashed')->name('item.trashed');
            Route::get('/item/{id}', 'show')->name('item.show');
            Route::get('/items/create', 'create')->name('item.create');
            Route::post('/item', 'store')->name('item.store');
            Route::get('/item/edit/{id}', 'edit')->name('item.edit');
            Route::put('/item/{id}', 'update')->name('item.update');
            Route::delete('/item/{id}', 'destroy')->name('item.destroy');
            Route::delete('/item/hdelete/{id}', 'hdelete')->name('item.hdelete');
            Route::get('/item/resotre/{id}', 'restore')->name('item.restore');
            Route::get('/items/export', 'export')->name('item.export');
        });
        // End Of Item routes
    });
});
// End of Admin Dashboard routes


// Start of FrontEnd Routes

Route::controller(Site\SiteController::class)->group(function () {

    // Localization Route
    Route::get('lang/{locale}', 'localization')->name('lang');
    // Localization Route

    // Site Routes
    Route::get('/home', 'index')->name('site.index');
    Route::get('/about', 'about')->name('site.about');
    Route::get('/contact', 'contact')->name('site.contact');
    Route::get('/categories', 'categories')->name('site.categories');
    Route::get('/categories/{id}/{name}', 'subcategories')->name('site.subcategories');
    Route::get('/subcategories/{id}/{name}', 'products')->name('site.products');
    Route::get('/products/{id}', 'product')->name('site.product');

});



Route::get('resualt', [SearchController::class, 'sitesearch'])->name('site.search');
