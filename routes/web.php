<?php

use App\Http\Controllers\Admin\ColorSettingController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\MenuItemController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\FrontEnd\IndexController;
use App\Http\Controllers\FrontEnd\PageController;
use App\Http\Controllers\Admin\FunctionController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\HtmlBlockController;
use App\Http\Controllers\Admin\UserThemeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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

/* Admin routes */

Auth::routes();

Auth::routes([
    'register' => false,
    'reset' => false,
]);

Route::get('/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');

Route::group([
    'middleware' => 'auth',
    'prefix' => 'admin',
], function() {
    Route::resource('/media', MediaController::class)->names('admin.media')->parameters([
        'media' => 'media',
    ]);
});

Route::group([
    'middleware' => 'auth',
    'prefix' => 'admin/site-settings',
], function() {
    Route::resource('/color', ColorSettingController::class)->names('admin.color');
    Route::resource('/company', CompanyController::class);
});

Route::group([
    'middleware' => 'auth',
    'prefix' => 'admin/site-options',
], function() {
    Route::resource('/menus', App\Http\Controllers\Admin\MenuController::class);
    Route::resource('/menu-items', MenuItemController::class);
    Route::resource('/hero', HeroController::class);
});

Route::group([
    'middleware' => 'auth',
    'prefix' => 'admin/page-builder',
], function() {
    Route::resource('/page', App\Http\Controllers\Admin\PageController::class);
    Route::get('/create/blade', [App\Http\Controllers\Admin\PageController::class, 'createBladeTemplate']);

    Route::get('/block', [HtmlBlockController::class, 'index']);
    Route::get('/block/about', [HtmlBlockController::class, 'about']);
    Route::get('/block/product', [HtmlBlockController::class, 'product']);
    Route::get('/block/service', [HtmlBlockController::class, 'service']);
    Route::get('/block/card', [HtmlBlockController::class, 'card']);
    Route::get('/block/paragraph', [HtmlBlockController::class, 'paragraph']);
    Route::get('/block/others', [HtmlBlockController::class, 'others']);
});

Route::group([
    'middleware' => 'auth',
    'prefix' => 'admin/setting',
], function() {
    Route::resource('users', UserController::class);
    Route::post('/toggle-theme', [UserThemeController::class, 'toggleTheme'])->name('toggleTheme');
    Route::resource('themes', UserThemeController::class)->middleware('check.user.type:1,2'); // User type 1,2 can't access this url
    Route::get('/help', [FunctionController::class, 'showHelp'])->name('help');
    Route::get('/clear-cache', [FunctionController::class, 'clearCache'])->name('clear.cache');
});

Route::group([
    'middleware' => 'auth',
    'prefix' => 'admin/pages',
], function() {
    Route::get('/contact', [FunctionController::class, 'showMessages']);
});

Route::prefix('admin/footer')->name('admin.footer.')->group(function () {
    Route::get('/', [FooterController::class, 'index'])->name('index');
    Route::get('/create', [FooterController::class, 'create'])->name('create');
    Route::post('/store', [FooterController::class, 'store'])->name('store');
    Route::get('/edit/{footer}', [FooterController::class, 'edit'])->name('edit');
    Route::put('/update/{footer}', [FooterController::class, 'update'])->name('update');
    Route::delete('/delete/{footer}', [FooterController::class, 'destroy'])->name('destroy');
    //Route::get('/activate/{id}', [FooterController::class, 'activate'])->name('activate');

    Route::post('/update-order', [FooterController::class, 'updateOrder'])->name('updateOrder');
    Route::get('/activate/{id}', [FooterController::class, 'activate'])->name('activate');
});


/** Front-End routes **/
Route::get('/', [IndexController::class, 'index']);
Route::get('/{slug}', [PageController::class, 'show']);
Route::get('/contact', [FunctionController::class, 'contact']);
Route::post('/contact', [FunctionController::class, 'submitForm'])->name('contact.submit');
