<?php
use App\Http\Controllers\Login\LoginController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\Brand\BrandController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\SubCategory\SubCategoryController;
use App\Http\Controllers\Admin\Coupon\CouponController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('homepage.index');
    // return view('auth.login');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('home');

    //Categories
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    Route::post('/category-store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/edit/category/{id}', [CategoryController::class, 'EditCategory'])->name('categories.edit');
    Route::post('/update/category/{id}', [CategoryController::class, 'UpdateCategory'])->name('categories.update');
    Route::get('/delete/category/{id}', [CategoryController::class, 'DeleteCategory'])->name('categories.destroy');;
    //SubCategories
    Route::get('/subcategories', [SubCategoryController::class, 'index'])->name('subcategories');
    Route::post('/subcategory-store', [SubCategoryController::class, 'store'])->name('subcategories.store');
    Route::get('/edit/subcategory/{id}', [SubCategoryController::class, 'EditSubCat'])->name('subcategories.edit');
    Route::post('/update/subcategory/{id}', [SubCategoryController::class, 'UpdateSubCat'])->name('subcategories.update');
    Route::get('/delete/subcategory/{id}', [SubCategoryController::class, 'DeleteSubCat'])->name('subcategories.destroy');;

    //Brands
    Route::get('/brands', [BrandController::class, 'index'])->name('brands');
    Route::post('/brand-store', [BrandController::class, 'store'])->name('brand.store');
    Route::get('/edit/brand/{id}', [BrandController::class, 'EditBrand'])->name('brand.edit');
    Route::post('/update/brand/{id}', [BrandController::class, 'UpdateBrand'])->name('brand.update');
    Route::get('/delete/brand/{id}', [BrandController::class, 'DeleteBrand'])->name('brand.destroy');;

    //Coupons
    Route::get('/admin/coupon', [CouponController::class, 'index'])->name('admin.coupon');
    Route::post('/coupon-store', [CouponController::class, 'store'])->name('coupon.store');
    Route::get('/edit/coupon/{id}', [CouponController::class, 'EditCoupon'])->name('coupon.edit');
    Route::post('/update/coupon/{id}', [CouponController::class, 'UpdateCoupon'])->name('coupon.update');
    Route::get('/delete/coupon/{id}', [CouponController::class, 'DeleteCoupon'])->name('coupon.destroy');;

    //newsletter
    Route::get('/admin/newsletter', [CouponController::class, 'Newsletter'])->name('admin.newsletter');
    Route::get('/delete/coupon/{id}', [CouponController::class, 'DeleteSub'])->name('newsletter.destroy');;

    //products
    Route::get('/admin/product/all', [ProductController::class, 'index'])->name('all.product');
    Route::get('/admin/product/add', [ProductController::class, 'create'])->name('product.add');

    //frontend routes
    Route::post('/store/newsletter', [FrontController::class, 'StoreNewsletter'])->name('store.newsletter');


    // Route::get('edit/category/{id}','Admin\Category\CategoryController@EditCategory');
    // Route::post('update/category/{id}','Admin\Category\CategoryController@UpdateCategory');
    // Route::get('delete/category/{id}','Admin\Category\CategoryController@DeleteCategory');



});



require __DIR__.'/auth.php';
