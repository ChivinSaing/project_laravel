<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ColorController;
use App\Http\Controllers\Backend\DiscountController;
use App\Http\Controllers\Backend\LogoController;
use App\Http\Controllers\Backend\NewsController;
use App\Http\Controllers\Backend\SizeController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\NewsFrontendController;
use App\Http\Controllers\Frontend\SearchController;
use App\Http\Controllers\Frontend\ShopController;
use Illuminate\Support\Facades\Route;

// start Frontend
Route::get('/',[HomeController::class,'index']);
Route::get('/product-detail/{id}',[HomeController::class,'detail']);
Route::get('/news',[NewsFrontendController::class,'index']);
Route::get('/news-detail/{id}',[NewsFrontendController::class,'newsdetail']);
Route::get('/shop',[ShopController::class,'index']);
Route::get('/search',[SearchController::class,'search']);

// end Frontend




Route::controller(UserController::class)->group(function(){
        // Route::get('/view-user','index')->name('viewuser');
        Route::get('/register','openregisterUser')->name('Openregister');
        Route::post('/register','registerUser')->name('Registeruser');
    
        Route::get('/login','openLogin')->name('Openlogin');
        Route::post('/login','login')->name('login');
    });
Route::middleware('auth')->group(function(){
    Route::get('/dashboard',function(){
        return view('Backend.index');
    });
    Route::prefix('/dashboard')->group(function(){
        Route::controller(LogoController::class)->group(function(){
            Route::get('/view-logo','index')->name('openLogo');
            Route::get('/add-logo','openAddLogo')->name('openAddLogo');
            Route::post('/add-logo','addLogo')->name('AddLogo');
            Route::get('/updateLogo/{id}','openUpdateLogo')->named('openUpdateLogo');
            Route::put('/updateLogo','updateLogo')->name('UpdateLogo');
            Route::post('/deleteLogo', 'DeleteLogo')->name('deleteLogo');
        });
    
        Route::controller(ColorController::class)->group(function(){
            Route::get('/view-color','index')->name('viewcolor');
            Route::get('/add-color','openaddColor')->name('addcolors');
            Route::post('/add-color','addcolor');
            
            Route::get('/updateColor/{id}','openupdatecolor')->name('openUpdateColor');
            Route::put('/updateColor','updatecolor')->name('Updatecolor');
    
            Route::post('/deleteColor','DeleteColor')->name('deletecolor');
    
        });
    
        Route::controller(SizeController::class)->group(function(){
            Route::get('/view-size','index')->name('viewsize');
            Route::get('/add-size','opensize')->name('Addsize');
            Route::post('/add-size','addsize');
            
            Route::get('/updatesize/{id}','openupdatesize')->name('openupdatesize');
            Route::put('/updatesize','updatesize')->name('Updatesize');
    
            Route::post('/deletesize','deletesize')->name('Deletesize');
        });
    
        Route::controller(DiscountController::class)->group(function(){
            Route::get('/view-discount','index')->name('viewdis');
            Route::get('/add-discount','opendis')->name('Adddis');
            Route::post('/add-discount','adddiscount');
            
            Route::get('/updatedis/{id}','openupdatdis')->name('openupdatedis');
            Route::put('/updatedis','updatedis')->name('Updatedis');
    
            Route::post('/deletedis','deletedis')->name('Deletedis');
        });

        Route::controller(CategoryController::class)->group(function(){
            Route::get('/view-category','index')->name('viewcategory');
            Route::get('/add-category','opencategory')->name('Addcategory');
            Route::post('/add-category','addcategory');
            
            Route::get('/updatecategory/{id}','openupdatecategory')->name('openupdatecategory');
            Route::put('/updatecategory','updatecategory')->name('Updatecategory');
    
            Route::post('/deletecategory','deletecategory')->name('Deletecategory');
        });

        Route::controller(ProductController::class)->group(function(){
            Route::get('/view-product','index')->name('viewpro');
            Route::get('/add-product','openpro')->name('Addpro');
            Route::post('/add-product','addproduct')->name('Product');
            
            Route::get('/updatepro/{id}','openupdatpro')->name('openupdatepro');
            Route::put('/updatepro','updatepro')->name('Updatepro');
    
            Route::post('/deletepro','deletepro')->name('Deletepro');
        });

        Route::controller(NewsController::class)->group(function(){
            Route::get('/view-news','index')->name('viewnews');
            Route::get('/add-new','opennews')->name('Addnews');
            Route::post('/add-new','addnews')->name('News');
            
            Route::get('/updatenew/{id}','openupdatenews')->name('OpenUpdateNews');
            Route::put('/updatenew','updatenews')->name('Updatenews');
    
            Route::post('/deletenew','deletenew')->name('Deletenews');
        });


    });
    Route::post('/logout',[UserController::class,'logout']);
    
});


