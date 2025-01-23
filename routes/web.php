<?php
use App\Http\Controllers\Login\LoginController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\Brand\BrandController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\SubCategory\SubCategoryController;
use App\Http\Controllers\Admin\Coupon\CouponController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\admin\Wishlist\WishlistController;
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
    Route::get('/delete/newsletter/{id}', [CouponController::class, 'DeleteNewsletter'])->name('newsletter.destroy');;

    //products
    Route::get('/admin/product/all', [ProductController::class, 'index'])->name('all.product');
    Route::get('/admin/product/add', [ProductController::class, 'create'])->name('product.add');
    Route::post('/admin/store/product', [ProductController::class, 'store'])->name('store.product');
    Route::get('/edit/product/{id}', [ProductController::class, 'EditProduct'])->name('product.edit');
    Route::post('/update/product/{id}', [ProductController::class, 'UpdateProduct'])->name('product.update');
    Route::get('/delete/product/{id}', [ProductController::class, 'DeleteProduct'])->name('product.destroy');;
    Route::get('/view/product/{id}', [ProductController::class, 'ViewProduct'])->name('product.view');;



    Route::get('/inactive/product/{id}', [ProductController::class, 'Inactive'])->name('inactive.product');;
    Route::get('/active/product/{id}', [ProductController::class, 'Active'])->name('active.product');;

    //get sub cat by ajax
    Route::get('/get/subcategory/{category_id}', [ProductController::class, 'GetSubcat']);

    //frontend routes
    Route::post('/store/newsletter', [FrontController::class, 'StoreNewsletter'])->name('store.newsletter');


    //blog routes
    Route::get('/admin/post/all', [PostController::class, 'index'])->name('all.blogpost');
    Route::get('/admin/add/post', [PostController::class, 'create'])->name('add.blogpost');
    Route::post('/admin/store/post', [PostController::class, 'store'])->name('store.blogpost');
    Route::get('/edit/post/{id}', [PostController::class, 'EditPost'])->name('blogpost.edit');
    Route::post('/update/post/{id}', [PostController::class, 'UpdatePost'])->name('blogpost.update');
    Route::get('/delete/post/{id}', [PostController::class, 'DeletePost'])->name('blogpost.destroy');;


    Route::get('add/wishlist/{id}', [WishlistController::class, 'AddWishlist']);

    // Route::get('edit/category/{id}','Admin\Category\CategoryController@EditCategory');
    // Route::post('update/category/{id}','Admin\Category\CategoryController@UpdateCategory');
    // Route::get('delete/category/{id}','Admin\Category\CategoryController@DeleteCategory');



});



require __DIR__.'/auth.php';
