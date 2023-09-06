<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProductPriceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//image upload path
define('img_upload_path', public_path('uploads/'));


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FrontendController::class, 'index']);


    Route::get('/admin', [AdminController::class, 'loginForm'])->name('admin.login');

    Route::post('admin/login', [AdminController::class, 'store'])->name('login.store.data');
    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/admin/logout/', [AdminController::class, 'destroy'])->name('admin.logout');

    Route::get('admin/dashboard',[App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');

        //admin Add product
        Route::prefix('product')->group(function () {
            Route::get('/add', [ProductPriceController::class, 'AddProduct'])->name('add.product');
            Route::post('store/', [ProductPriceController::class, 'StoreProduct'])->name('product.store');
            Route::get('manage/', [ProductPriceController::class, 'ManageProduct'])->name('manage-product');
            Route::get('edit/{id}', [ProductPriceController::class, 'EditProduct'])->name('product.edit');
            Route::post('/data/update/', [ProductPriceController::class, 'UpdateProduct'])->name('product.update');
            Route::post('/image/update/', [ProductPriceController::class, 'UpdateProductImg'])->name('update-product-img');
            Route::post('/thumbnil/img/update', [ProductPriceController::class, 'UpdateProductThumbnil'])->name('update-product-thumbnil');
            Route::get('multi/image/delete/{id}', [ProductPriceController::class, 'DeleteProductMultiImage'])->name('product.multiimg.delete');
            Route::get('/delete/{id}', [ProductPriceController::class, 'ProductDelete'])->name('product.delete');
        });
        Route::prefix('User')->group(function () {

            Route::get('/product', [ClientController::class, 'index'])->name('user.product');
            Route::get('product/add', [ClientController::class, 'Assign'])->name('assign.product');
            Route::post('/product/store',[ClientController::class,'ProductStotr'])->name('user.product.store');
            Route::get('/product/ajax/{product_id}', [ClientController::class, 'GetProduct']);

            Route::get('product/delete/{id}', [ClientController::class, 'ProductDelete'])->name('user.product.delete');


            // assign.product

        });
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
