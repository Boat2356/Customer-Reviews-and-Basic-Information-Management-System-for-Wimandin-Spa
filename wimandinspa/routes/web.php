<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostTypeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\ServiceTypesController;

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
    #return view('welcome');
    return view('homeUser');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
Route::resource('contacts', ContactController::class);
Route::get('contact/{id}', [ContactController::class, 'changeCS'])->name('changeCS');
Route::resource('post', PostController::class);
Route::get('posts/{id}', [PostController::class, 'change'])->name('change');
Route::post('/upload', [PostController::class, 'upload'])->name('ckeditor.upload');
Route::resource('post_types', PostTypeController::class);
Route::resource('reviews', ReviewController::class);
Route::resource('rooms', RoomController::class);
Route::resource('services', ServicesController::class);
Route::resource('service_types', ServiceTypesController::class);
Route::resource('faqs', FaqController::class);
Route::get('faq/{id}', [FaqController::class, 'changeFS'])->name('changeFS');
Route::get('service/{id}', [ServicesController::class, 'changeSs'])->name('changeSs');
Route::get('review/{id}', [ReviewController::class, 'changeRS'])->name('changeRS');
*/

/*
Route::get('/Admindashboard', function () {
    return view('dashboardAdmin');
})->name('Admindashboard')->middleware('auth', 'is_admin');*/


Route::get('/homeUser', function () {
    return view('homeUser');
})->name('homeUser');

Route::get('/service_treatment', function () {
    return view('service_treatment');
})->name('service_treatment');

Route::get('/service_room', function () {
    return view('service_room');
})->name('service_room');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');

Route::get('/review', function () {
    return view('review');
})->name('review');

Route::get('/reviewAdd', function () {
    return view('review_add');
})->name('reviewAdd');

/*
Route::get('/userProfile', function () {
    return view('userProfile.showprofile');
})->name('userprofile');*/


Route::get('/error', function () {
    return view('error_page');
})->name('error');


Route::post('post/{post_type_id}', [PostController::class, 'showPost'])->name('showPost');
Route::get('posts/{post_type_id}/{post_id}', [PostController::class, 'showPostDetail'])->name('showPostDetail');
Route::get('/service_treatment', [ServicesController::class, 'getAllServiceTypes'])->name('service_treatment');
Route::get('/service_room', [RoomController::class, 'getAllRooms'])->name('service_room');
Route::get('/faq', [FaqController::class, 'getAllFAQ'])->name('faq');
Route::get('/review', [ReviewController::class, 'getAllReviews'])->name('review');


# เฉพาะ Admin ถึงเข้าได้
Route::group(['middleware' => ['auth', 'is_admin']], function () {
    Route::get('/Admindashboard', function () {
        return view('dashboardAdmin');
    })->name('Admindashboard');

    Route::resource('contacts', ContactController::class);
    Route::get('contact/{id}', [ContactController::class, 'changeCS'])->name('changeCS');    
    Route::get('post/create', [PostController::class, 'create'])->name('post.create');

    #เส้นทาง url ของ โพสต์
    Route::get('posts/{id}', [PostController::class, 'change'])->name('change');
    Route::get('post/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::put('post/{post}', [PostController::class, 'update'])->name('post.update');
    Route::post('/upload', [PostController::class, 'upload'])->name('ckeditor.upload');
    
    Route::resource('post_types', PostTypeController::class);
    
    Route::resource('rooms', RoomController::class);
    Route::resource('services', ServicesController::class);
    Route::resource('service_types', ServiceTypesController::class);
    Route::resource('faqs', FaqController::class);
    Route::get('faq/{id}', [FaqController::class, 'changeFS'])->name('changeFS');
    Route::get('service/{id}', [ServicesController::class, 'changeSs'])->name('changeSs');
    Route::get('review/{id}', [ReviewController::class, 'changeRS'])->name('changeRS');
    Route::get('reviews/create', [ReviewController::class, 'create'])->name('review.create');
    


    Route::get('/myshop', function () {
        return view('myshop');
    })->name('web.myshop');
});
Route::resource('reviews', ReviewController::class);
Route::resource('post', PostController::class);
#Route::get('reviews/create', [ReviewController::class, 'create'])->name('review.create');

Route::get('/home', [HomeController::class, 'index']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');



Route::group(['middleware' => ['auth', 'is_customer']], function () {
    
});

Route::get('/userProfile', function () {
    return view('userProfile.showprofile');
})->name('userprofile');



require __DIR__ . '/auth.php';
