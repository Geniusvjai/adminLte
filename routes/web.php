<?php

use Illuminate\Support\Facades\Route;

// web controller 
use App\Http\Controllers\Site\WebController;
use App\Http\Controllers\Site\ContactController;
use App\Http\Controllers\Site\LoginController;
use App\Http\Controllers\Site\CartController;
use App\Http\Controllers\Site\PaymentController;
use App\Http\Controllers\Site\OrdersController;
use App\Http\Controllers\Site\ProfileUpdateController;
use App\Http\Controllers\Site\RazorpayPaymentController;
use App\Http\Controllers\Site\ShopController;




// admin routes 
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\SubCategoryController;
use App\Http\Controllers\admin\WebBannerController;

// admin routes 
Route::get('/', [UserController::class, 'login'])->name('login');
Route::POST('/login-check', [UserController::class, 'login_check'])->name('login-check');

Route::middleware([loginCheck::class])->group(function () {

    //this routes is from user controller class
    Route::get('/login', [UserController::class, 'logOut'])->name('logout');
    Route::get('/admin/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

    //this routes is from profile controller class
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::POST('/update-profile', [ProfileController::class, 'update_Profile'])->name('update-profile');
    Route::POST('/update-password', [ProfileController::class, 'update_Password'])->name('update-password');


    //this routes is for user controller class
    Route::get('/admin/users', [UserController::class, 'users'])->name('users');
    Route::get('/admin/users/add-users', [UserController::class, 'add_users'])->name('add-users');
    Route::POST('/admin/users/update-users', [UserController::class, 'UpdateUsers'])->name('update-users');
    Route::POST('/fetch-data-view-modal', [UserController::class, 'fetch_data_view_modal']);
    Route::POST('/fetch-data-edit-modal', [UserController::class, 'fetch_data_edit_modal']);
    Route::POST('/update-data', [UserController::class, 'update_data']);
    Route::POST('/delete-data', [UserController::class, 'delete_data']);
    Route::get('/change-user-status', [UserController::class, 'changeUserStatus']);


    //this routes is for products controllers class
    Route::get('/admin/products', [ProductController::class, 'product'])->name('product');
    Route::get('/admin/product/add-product', [ProductController::class, 'AddProduct'])->name('add-product');
    Route::POST('/admin/product/add-product/get-data-sub-category', [ProductController::class, 'SubCatData'])->name('getdata');
    Route::POST('/admin/product/add-product/insert-product', [ProductController::class, 'InsertProduct'])->name('insert-product');
    Route::POST('/view-product-data', [ProductController::class, 'productDataVIew'])->name('view-product-data');
    Route::get('/admin/product/edit-product/{id}', [ProductController::class, 'productDataEdit'])->name('edit-product-data');
    Route::POST('/admin/product/update-product', [ProductController::class, 'productDataUpdate'])->name('update-product-data');
    Route::POST('/admin/product/fetch-gallary-images', [ProductController::class, 'productGallaryImages'])->name('fetch-gallary-images');
    Route::POST('/change-product-status', [ProductController::class, 'changeProductStatus'])->name('change-product-status');
    Route::POST('/delete-product-data', [ProductController::class, 'DeleteProductData'])->name('delete-product-data');


    //this routes is for category controllers class
    Route::get('/admin/category', [CategoryController::class, 'CategoryMethod'])->name('category');
    Route::get('/admin/category/add-category', [CategoryController::class, 'AddCategory'])->name('add-category');
    Route::POST('/add-cat', [CategoryController::class, 'AddCat'])->name('add-cat');
    Route::POST('/view-category', [CategoryController::class, 'ViewCategory'])->name('view-category');
    Route::get('/admin/category/edit-category/{id}', [CategoryController::class, 'editCategory'])->name('category-edit');
    Route::POST('/update-category/{id}', [CategoryController::class, 'updateCategory'])->name('update-category');
    Route::POST('/delete-category', [CategoryController::class, 'deleteCategory'])->name('delete-category');
    Route::POST('/change-category-status', [CategoryController::class, 'ChangeCategoryStatus'])->name('change-category-status');


    //this routes is for sub category controllers class
    Route::get('/admin/sub-category', [SubCategoryController::class, 'index'])->name('sub-category');
    Route::get('/admin/sub-category/add-sub-category', [SubCategoryController::class, 'AddSubCategory'])->name('add-sub-category');
    Route::POST('/add-sub-cat', [SubCategoryController::class, 'AddSubCat'])->name('add-sub-cat');
    Route::POST('/view-sub-category', [SubCategoryController::class, 'ViewSubCategory'])->name('view-sub-category');
    Route::get('/admin/sub-category/edit-sub-category/{id}', [SubCategoryController::class, 'editSubCategory'])->name('sub-category-edit');
    Route::POST('/admin/sub-category/edit-sub-category/update-sub-category', [SubCategoryController::class, 'updateSubCategory'])->name('update-sub-category');
    Route::POST('/delete-sub-category', [SubCategoryController::class, 'deleteSubCategory'])->name('delete-sub-category');
    Route::POST('/change-sub-category-status', [SubCategoryController::class, 'ChangeSubCategoryStatus'])->name('change-sub-category-status');


    // website banner
    Route::get('/admin/banner', [WebBannerController::class, 'WebBanner'])->name('website-banner');
    Route::get('/admin/banner/add-banner', [WebBannerController::class, 'AddBanner'])->name('add-banner');
    Route::POST('/admin/banner/insert-banner', [WebBannerController::class, 'InsertBanner'])->name('insert-banner');
    Route::POST('/admin/banner/view-banner', [WebBannerController::class, 'ViewBanner'])->name('view-banner');
    Route::get('/admin/banner/edit-banner/{id}', [WebBannerController::class, 'EditBanner'])->name('edit-banner');
    Route::POST('/admin/banner/edit-banner/update-banner', [WebBannerController::class, 'updateBanner'])->name('update-banner');
    Route::POST('/admin/banner/change-status', [WebBannerController::class, 'StatusChange'])->name('status-change');
    Route::POST('/admin/banner/banner-data-delete', [WebBannerController::class, 'BannerDataDelete'])->name('banner-data-delete');
});
// admin routes ends 

Route::get('/web-login', [LoginController::class, 'WebLogin'])->name('web-login'); //redirect to home page 
Route::POST('/login-process', [LoginController::class, 'LoginProcess'])->name('login-process'); //login using auth

// Google Login
Route::get('/login/google', [LoginController::class, 'redirectToGoogle'])->name('login.google'); //redirect to google page 
Route::get('/login/google/callback', [LoginController::class, 'handleGoogleCallback']);

// Facebook Login
Route::get('/login/facebook', [LoginController::class, 'redirectToFacebook'])->name('login.facebook'); //redirect to facebook page 
Route::get('/login/facebook/callback', [LoginController::class, 'handleFacebookCallback']);

// Website Routes 
Route::get('/logged-out', [LoginController::class, 'LoggedOut'])->name('logged-out'); //redirect to login page 
Route::get('/register', [LoginController::class, 'WebRegister'])->name('register'); // redirect to register page
Route::get('/forgot-password', [LoginController::class, 'WebForgotPassword'])->name('register-password');
//forget pass

Route::get('/home', [WebController::class, 'Home'])->name('Home'); // redirect to home page
// site index page website routes  

Route::post('razorpay-payment', [RazorpayPaymentController::class, 'store'])->name('razorpay.payment.store');
Route::get('/product-details/{id}', [WebController::class, 'ProductDetails']); //redirect to product details page when user click on a particular product  
Route::get('/product-category/{id}', [WebController::class, 'ProductCategory']); // redirect to shop page which use to show product of particular category
Route::get('/shop', [WebController::class, 'TotalProduct']); // redirect to shop page which use to show product of particular category

// site shop-checkout page website routes 
Route::get('/shop-checkout', [WebController::class, 'ShopCheckoutPage']); // redirect to checkout page  
Route::POST('/email-subscribed', [WebController::class, 'EmailSubscribe']); // this is for email subscribed section

// site cart controller
Route::POST('/add-to-cart', [CartController::class, 'AddToCart'])->name('add-to-cart'); // for add to cart using cookie
Route::get('/cart', [CartController::class, 'index'])->name('cart.page'); // open cart and show details which user added to cart 
Route::get('/load-cart-data', [CartController::class, 'cartloadbyajax']);
Route::POST('update-to-cart', [CartController::class, 'updatetocart']);
Route::delete('delete-from-cart',  [CartController::class, 'deletefromcart']);
Route::get('clear-cart',  [CartController::class, 'clearcart']);
Route::get('cart-checkout', [CartController::class, 'cartCheckout']);

// site paypal integration routes
Route::get('payment', [PaymentController::class, 'paymentIndex']);
Route::post('charge', [PaymentController::class, 'charge']);
Route::get('success', [PaymentController::class, 'success']);
Route::get('error', [PaymentController::class, 'error']);


// site shop-contact page website routes starts 
Route::get('/contact', [ContactController::class, 'ContactPage']); //redirect to contact page 
Route::POST('/contact/register-form', [ContactController::class, 'ShopContactForm'])->name('register-form'); // redirect to register process

//site Orders routes
Route::get('/orders', [OrdersController::class, 'OrdersData'])->name('orders.data');
Route::post('/show-order', [OrdersController::class, 'showOrderDetails'])->name('show.order.detail');

//site profile update Routes 
Route::get('/profile-update', [ProfileUpdateController::class, 'profileView']);
Route::POST('/update-site-profile', [ProfileUpdateController::class, 'updateProfile'])->name('update.profile');

// shop page filter url
Route::post('/price/{price}', [ShopController::class, 'priceData'])->name('priceData');