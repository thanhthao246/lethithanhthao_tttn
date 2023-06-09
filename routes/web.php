<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\SiteController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\PageController;
use App\Http\Controllers\backend\TopicController;
use App\Http\Controllers\backend\MenuController;
use App\Http\Controllers\backend\SliderController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\AuthController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\frontend\DangNhapController;

//file này bị thay đổi
//nhập message cho commit
//nhấn commit

Route::get('/', [SiteController::class, 'index'])->name('site.home');
Route::get('san-pham', [SiteController::class, 'product'])->name('site.product');
Route::get('thuong-hieu', [SiteController::class, 'brand'])->name('site.brand');
Route::get('bai-viet', [SiteController::class, 'post'])->name('site.post');
Route::get('khach-hang', [LienheController::class, 'index'])->name('site.index');
Route::get("/tim-kiem", [siteController::class, 'timkiem'])->name('site.timkiem');

//liên hệ
Route::get('lien-he',[ContactController::class,'index'])->name('frontend.contact');
Route::post('lien-he',[ContactController::class,'postcontact'])->name('contact.postcontact');

//giỏ hàng
Route::get('gio-hang', [CartController::class, 'index'])->name('gio-hang.index');
route::get('AddCart/{id}', [CartController::class, 'AddCart'])->name('gio-hang.AddCart');
Route::get('list-cart', [CartController::class, 'ListCart'])->name('gio-hang.list-cart');
route::get('DeleteCart/{id}', [CartController::class, 'DeleteCart'])->name('gio-hang.DeleteCart');
Route::get('Delete-List-Cart/{id}',[CartController::class,'DeleteListCart']);
Route::get('Save-List-Cart/{id}/{quanty}',[CartController::class,'SaveListCart']);

//đăng ký và đăng nhập 
//đăng ký
Route::get('dang-ky',[DangNhapController::class,'dangky'])->name('login.dangky');
Route::post('dang-ky',[DangNhapController::class,'xulydangky'])->name('login.xulidangky');
//đăng nhập



//xử lý login admin
Route::get('admin/login', [AuthController::class, 'getlogin'])->name('getlogin');
Route::post('admin/login', [AuthController::class, 'postlogin'])->name('postlogin');
Route::get('admin/logout', [AuthController::class, 'logout'])->name('logout');

// Route::get('admin/login', 'backend/AuthController@getlogin')->name('getlogin');
// Route::post('admin/login', 'backend/AuthController@postlogin')->name('postlogin');

//khai báo route cho trang quan lí
route::group(['prefix' => 'admin', 'middleware' => 'LoginAdmin'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('brand', BrandController::class);
    //product
    Route::resource('product', ProductController::class);
    route::get('product_trash', [ProductController::class, 'trash'])->name('product.trash');
    Route::prefix('product')->group(function () {
        route::get('status/{product}', [ProductController::class, 'status'])->name('product.status');
        route::get('delete/{product}', [ProductController::class, 'delete'])->name('product.delete');
        route::get('restore/{product}', [ProductController::class, 'restore'])->name('product.restore');
        route::get('destroy/{product}', [ProductController::class, 'destroy'])->name('product.destroy');
    });
    //category
    Route::resource('category', CategoryController::class);
    route::get('category_trash', [CategoryController::class, 'trash'])->name('category.trash');
    Route::prefix('category')->group(function () {
        route::get('status/{category}', [CategoryController::class, 'status'])->name('category.status');
        route::get('delete/{category}', [CategoryController::class, 'delete'])->name('category.delete');
        route::get('restore/{category}', [CategoryController::class, 'restore'])->name('category.restore');
        route::get('destroy/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
    });
    //brand
    Route::resource('brand', BrandController::class);
    route::get('brand_trash', [BrandController::class, 'trash'])->name('brand.trash');
    Route::prefix('brand')->group(function () {
        route::get('status/{brand}', [BrandController::class, 'status'])->name('brand.status');
        route::get('delete/{brand}', [BrandController::class, 'delete'])->name('brand.delete');
        route::get('restore/{brand}', [BrandController::class, 'restore'])->name('brand.restore');
        route::get('destroy/{brand}', [BrandController::class, 'destroy'])->name('brand.destroy');
    });
    //post
    Route::resource('post', PostController::class);
    route::get('post_trash', [PostController::class, 'trash'])->name('post.trash');
    Route::prefix('post')->group(function () {
        route::get('status/{post}', [PostController::class, 'status'])->name('post.status');
        route::get('delete/{post}', [PostController::class, 'delete'])->name('post.delete');
        route::get('restore/{post}', [PostController::class, 'restore'])->name('post.restore');
        route::get('destroy/{post}', [PostController::class, 'destroy'])->name('post.destroy');
    });
    //page
    Route::resource('page', PageController::class);
    route::get('page_trash', [PageController::class, 'trash'])->name('page.trash');
    Route::prefix('page')->group(function () {
        route::get('status/{page}', [PageController::class, 'status'])->name('page.status');
        route::get('delete/{page}', [PageController::class, 'delete'])->name('page.delete');
        route::get('restore/{page}', [PageController::class, 'restore'])->name('page.restore');
        route::get('destroy/{page}', [PageController::class, 'destroy'])->name('page.destroy');
    });
    //topic
    Route::resource('topic', TopicController::class);
    route::get('topic_trash', [TopicController::class, 'trash'])->name('topic.trash');
    Route::prefix('topic')->group(function () {
        route::get('status/{topic}', [TopicController::class, 'status'])->name('topic.status');
        route::get('delete/{topic}', [TopicController::class, 'delete'])->name('topic.delete');
        route::get('restore/{topic}', [TopicController::class, 'restore'])->name('topic.restore');
        route::get('destroy/{topic}', [TopicController::class, 'destroy'])->name('topic.destroy');
    });
    //menu
    Route::resource('menu', MenuController::class);
    route::get('menu_trash', [MenuController::class, 'trash'])->name('menu.trash');
    Route::prefix('menu')->group(function () {
        route::get('status/{menu}', [MenuController::class, 'status'])->name('menu.status');
        route::get('delete/{menu}', [MenuController::class, 'delete'])->name('menu.delete');
        route::get('restore/{menu}', [MenuController::class, 'restore'])->name('menu.restore');
        route::get('destroy/{menu}', [MenuController::class, 'destroy'])->name('menu.destroy');
    });
    //slider
    Route::resource('slider', SliderController::class);
    route::get('slider_trash', [SliderController::class, 'trash'])->name('slider.trash');
    Route::prefix('slider')->group(function () {
        route::get('status/{slider}', [SliderController::class, 'status'])->name('slider.status');
        route::get('delete/{slider}', [SliderController::class, 'delete'])->name('slider.delete');
        route::get('restore/{slider}', [SliderController::class, 'restore'])->name('slider.restore');
        route::get('destroy/{slider}', [SliderController::class, 'destroy'])->name('slider.destroy');
    });

    Route::resource('product', ProductController::class);
});




Route::get('{slug}', [SiteController::class, 'index'])->name('slug.home');
