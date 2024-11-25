<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Frontend\AboutContractController;
use App\Http\Controllers\Frontend\CatBlogController;
use App\Http\Controllers\Frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\Frontend\UserAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialLinkController;
use App\Http\Controllers\UserRequestController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;


Auth::routes(['register' => false]);

// Route::get('/', function () {
//     return view('welcome');
// });



// frontend

Route::get('/',[FrontendHomeController::class,'index'])->name('frontend');

Route::get('/frontend/category/{id}',[CatBlogController::class,'show_category'])->name('front.category.blog');
Route::get('/frontend/blog',[CatBlogController::class,'show_blog'])->name('front.blog');
Route::get('/frontend/blog/single/{id}',[CatBlogController::class,'show_blog_single'])->name('front.blog.single');
// Route::get('/frontend/blog/single/viewstats',[CatBlogController::class,'viewstats'])->name('front.blog.single.viewstats');
Route::post('/frontend/blog/comment/{id}',[CatBlogController::class,'comment'])->name('front.blog.comment');


// news letter subscribe
Route::post('/subscribe',[NewsletterController::class,'subscribe'])->name('newsletter.subscribe');


// frontend Bog Search
Route::get('/search',[CatBlogController::class,'search'])->name('blog.search');


// my error
Route::get('/myerror',[CatBlogController::class,'myerror'])->name('myerror');


// frontend about,contact & author
Route::get('/frontend/about',[AboutContractController::class,'index1'])->name('front.about');
Route::get('/frontend/contact',[AboutContractController::class,'index2'])->name('front.contact');
Route::get('/frontend/author',[AboutContractController::class,'author_index'])->name('front.author');
Route::get('/frontend/author/name/{id}',[AboutContractController::class,'author_name'])->name('front.author.name');


// for contact us page
Route::post('/frontend/contact/store',[AboutContractController::class,'store'])->name('front.contact.store');


// signup & signin

Route::get('/guest/register',[UserAuthController::class,'register'])->name('guest.register');
Route::post('/guest/register',[UserAuthController::class,'register_post'])->name('guest.register');
Route::get('/guest/login',[UserAuthController::class,'login'])->name('guest.login');
Route::post('/guest/login',[UserAuthController::class,'login_post'])->name('guest.login');


// dashboard home

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth', 'verified']);

// profile update

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
Route::post('/profile/name/update', [App\Http\Controllers\ProfileController::class, 'name_update'])->name('profile.name.update');
Route::post('/profile/email/update', [App\Http\Controllers\ProfileController::class, 'email_update'])->name('profile.email.update');
Route::post('/profile/password/update', [App\Http\Controllers\ProfileController::class, 'password_update'])->name('profile.password.update');
Route::post('/profile/image/update', [App\Http\Controllers\ProfileController::class, 'image_update'])->name('profile.image.update');


// eta middleware er bahire calano hoyeche karon eta user zate use korte pare
Route::post('/blogger/request/send/{id}',[UserRequestController::class,'blogger_request_send'])->name('blogger.request.send');

// middleware start here
Route::middleware('manage_user')->group(function(){

// management

// eti evabeo kaj kore
// Route::get('/user/authenticate',[ManagementController::class,'index'])->name('management.index')->middleware('manage_user');

Route::get('/user/authenticate',[ManagementController::class,'index'])->name('management.index');
Route::post('/user/authenticate',[ManagementController::class,'create_user'])->name('management.create.user');
Route::get('/user/role_assign',[ManagementController::class,'role_assign'])->name('management.role.assign');
Route::post('/user/role_assign',[ManagementController::class,'role_assign_update'])->name('management.role.assign.update');




// category update

Route::get('/category/show_category',[CategoryController::class, 'index1'])->name('category.index1');
Route::get('/category/create_category',[CategoryController::class, 'index2'])->name('category.index2');
Route::post('/category/store',[CategoryController::class, 'store'])->name('category.store');
Route::get('/category/edit/{id}',[CategoryController::class, 'edit'])->name('category.edit');
Route::post('/category/update/{id}',[CategoryController::class, 'update'])->name('category.update');
Route::post('/category/delete/{id}',[CategoryController::class, 'delete'])->name('category.delete');
Route::post('/category/status/{id}',[CategoryController::class, 'status'])->name('category.status');



// blog update


Route::resource('/blog', BlogController::class);
Route::post('/blog/status/{id}',[BlogController::class,'status'])->name('blog.status');
Route::post('/blog/feature/{id}',[BlogController::class,'feature'])->name('blog.feature');

Route::get('/user/message',[UserRequestController::class,'user_message'])->name('user.message');
Route::get('/blogger/request',[UserRequestController::class,'blogger_request'])->name('blogger.request');
Route::get('/blogger/request/accept/{id}',[UserRequestController::class,'blogger_request_accept'])->name('blogger.request.accept');
Route::get('/blogger/request/cancel/{id}',[UserRequestController::class,'blogger_request_cancel'])->name('blogger.request.cancel');



});


Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
