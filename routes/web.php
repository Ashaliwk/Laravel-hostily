<?php

Auth::routes(['verify' => false]);
// //frontend
use App\Http\Controllers\frontend\IndexController;
use App\Http\Controllers\frontend\AboutController;
use App\Http\Controllers\frontend\blogdetailscontroller;
use App\Http\Controllers\frontend\bloggridcontroller;
use App\Http\Controllers\frontend\blogstandardcontroller;
use App\Http\Controllers\frontend\contactcontroller;
use App\Http\Controllers\frontend\maincontroller;
use App\Http\Controllers\frontend\bookcontroller;
use App\Http\Controllers\frontend\roomlistcontroller;
use App\Http\Controllers\frontend\roommoderncontroller;
use App\Http\Controllers\frontend\roomstylecontroller;
use App\Http\Controllers\frontend\pricingcontroller;
use App\Http\Controllers\frontend\servicesdetailscontroller;
use App\Http\Controllers\frontend\servicesteamcontroller;
use App\Http\Controllers\frontend\RoomController;
use App\Http\Controllers\frontend\BookingController;
use Illuminate\Support\Facades\Route;

//Backend controller
use App\Http\Controllers\backend\AdminLoginController;
use App\Http\Controllers\backend\AdminHomeController;
use App\Http\Controllers\backend\AdminProjectsController;
use App\Http\Controllers\backend\TeamMemberController;
use App\Http\Controllers\backend\AdminFaqsController;
use App\Http\Controllers\backend\AdminReviewController;
use App\Http\Controllers\backend\AdminShopController;
use App\Http\Controllers\backend\AdminProductController;
use App\Http\Controllers\backend\AdminroomsController;
use App\Http\Controllers\backend\AdminWaffleController;
use App\Http\Controllers\backend\AdminCartController;
use App\Http\Controllers\backend\Fitemcontroller;

#Frontend

Route::get('/', [IndexController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);
Route::get('/bloggrid', [bloggridcontroller::class, 'index']);
Route::get('/roomdetails/{id}', [RoomController::class, 'show'])->name('room.details');
Route::get('/blogstandard', [blogstandardcontroller::class, 'index']);
Route::get('/blogdetails', [blogdetailscontroller::class, 'index']);
Route::get('/book', [bookcontroller::class, 'index']);
Route::get('/main', [maincontroller::class, 'index']);
Route::get('/roomlist', [roomlistcontroller::class, 'index']);
Route::get('/roommodern', [roommoderncontroller::class, 'index'])->name('room.modern');
Route::get('/roomstyle', [roomstylecontroller::class, 'index']);
Route::get('/pricing', [pricingcontroller::class, 'index']);
Route::get('/servicesdetails', [servicesdetailscontroller::class, 'index']);
Route::get('/servicesteam', [servicesteamcontroller::class, 'index']);
Route::get('/contact', [contactcontroller::class, 'index']);
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
//Route::middleware('auth')->group(function () {
//Route::post('/book-room', [BookingController::class, 'store'])->name('book.room');
//});
// Allow guests (non-logged-in users) to book a room
Route::get('/book/{id}', [App\Http\Controllers\frontend\BookingController::class, 'show'])->name('booking.page');
Route::post('/book-room', [App\Http\Controllers\frontend\BookingController::class, 'store'])->name('book.room');
Route::get('/booking-success', [BookingController::class, 'success'])->name('booking.success');
Route::get('/search-rooms', [App\Http\Controllers\Frontend\RoomController::class, 'search'])->name('search.rooms');
// Backend
//Login Page
Route::get('/admin/login', [AdminLoginController::class, 'index']);
Route::get('/admin/login', function(){
    if(session()->has('email')){
        return redirect('/admin');
    } else{
        return view('backend.login');
    }
});

Route::post('/admin/login', [AdminLoginController::class, 'onLogin']);
Route::get('/admin/logout', [AdminLoginController::class, 'logoutAdmin']);

Route::get('/admin', [AdminHomeController::class, 'index']);
// Route::get('/admin', function(){
//     if(session()->has('email')){
//         return redirect('/admin');
//     } else{
//         return view('backend.login');
//     }
// });

Route::get('/cart', [AdminCartController::class, 'index']);
Route::post('/cart/add', [AdminCartController::class, 'add'])->name('cart.add');
Route::get('/cart/content', [AdminCartController::class, 'getCartContent'])->name('cart.content');
Route::get('/admin/register', [AdminHomeController::class, 'registerAdmin'])->name('admin.create');
Route::post('/admin/register', [AdminHomeController::class, 'submitAdminRecord']);
Route::get('/admin/admins-list', [AdminHomeController::class, 'showAdminRecord'])->name('admin.show');
Route::get('/admin/delete/{id}', [AdminHomeController::class, 'deleteAdminRecord'])->name('admin.delete');
Route::get('/admin/edit/{id}', [AdminHomeController::class, 'editAdminRecord'])->name('admin.edit');
Route::get('/admin/update/{id}', [AdminHomeController::class, 'updateAdminRecord'])->name('admin.update');


// Team Management
Route::get('/admin/team', [TeamMemberController::class, 'index'])->name('team.show');
Route::get('/admin/team-member-details/{id}', [TeamMemberController::class, 'showTeamMember'])->name('team.details');
Route::get('/admin/team-add', [TeamMemberController::class, 'registerTeam'])->name('team.add');
Route::post('/admin/team-add', [TeamMemberController::class, 'submitTeamRecord']);
Route::get('/admin/team-edit/{id}', [TeamMemberController::class, 'editTeam'])->name('team.edit');
Route::put('/admin/team-edit/{id}', [TeamMemberController::class, 'updateTeam'])->name('team.update');
Route::delete('/admin/team-delete/{id}', [TeamMemberController::class, 'deleteTeam'])->name('team.delete');

// Reviews Management
Route::get('/admin/reviews', [AdminReviewController::class, 'index'])->name('review.show');
Route::get('/admin/review-add', [AdminReviewController::class, 'addReview'])->name('review.add');
Route::post('/admin/review-add', [AdminReviewController::class, 'submitReviewRecord']);
Route::get('/admin/review-edit/{id}', [AdminReviewController::class, 'editReview'])->name('review.edit');
Route::put('/admin/review-edit/{id}', [AdminReviewController::class, 'updateReview'])->name('review.update');
Route::delete('/admin/review-delete/{id}', [AdminReviewController::class, 'deleteReview'])->name('review.delete');

// FAQs Management
Route::get('/admin/faqs', [AdminFaqsController::class, 'index'])->name('faq.show');
Route::get('/admin/faq-add', [AdminFaqsController::class, 'addFAQ'])->name('faq.add');
Route::post('/admin/faq-add', [AdminFaqsController::class, 'submitFaqRecord']);
Route::get('/admin/faq-edit/{id}', [AdminFaqsController::class, 'editFAQ'])->name('faq.edit');
Route::put('/admin/faq-edit/{id}', [AdminFaqsController::class, 'updateFAQ'])->name('faq.update');
Route::delete('/admin/faq-delete/{id}', [AdminFaqsController::class, 'deleteFAQ'])->name('faq.delete');

// Shops Management
Route::get('/admin/shops', [AdminShopController::class, 'index'])->name('shop.show');
Route::get('/admin/shop-add', [AdminShopController::class, 'addShop'])->name('shop.add');
Route::post('/admin/shop-add', [AdminShopController::class, 'submitShopRecord']);
Route::get('/admin/shop-edit/{id}', [AdminShopController::class, 'editShop'])->name('shop.edit');
Route::put('/admin/shop-edit/{id}', [AdminShopController::class, 'updateShop'])->name('shop.update');
Route::delete('/admin/shop-delete/{id}', [AdminShopController::class, 'deleteShop'])->name('shop.delete');

// Products Management
Route::get('/admin/homeproducts', [AdminProductController::class, 'index'])->name('product.show');
Route::get('/admin/product-add', [AdminProductController::class, 'addProduct'])->name('product.add');
Route::post('/admin/product-add', [AdminProductController::class, 'submitProductRecord']);
Route::get('/admin/product-edit/{id}', [AdminProductController::class, 'editProduct'])->name('product.edit');
Route::put('/admin/product-edit/{id}', [AdminProductController::class, 'updateProduct'])->name('product.update');
Route::delete('/admin/product-delete/{id}', [AdminProductController::class, 'deleteProduct'])->name('product.delete');

// Waffles Management
Route::get('/admin/waffleproduct', [AdminWaffleController::class, 'index'])->name('waffle.show');
Route::get('/admin/waffle-add', [AdminWaffleController::class, 'addWaffle'])->name('waffle.add');
Route::post('/admin/waffle-add', [AdminWaffleController::class, 'submitWaffleRecord']);
Route::get('/admin/waffle-edit/{id}', [AdminWaffleController::class, 'editWaffle'])->name('waffle.edit');
Route::put('/admin/waffle-edit/{id}', [AdminWaffleController::class, 'updateWaffle'])->name('waffle.update');
Route::delete('/admin/waffle-delete/{id}', [AdminWaffleController::class, 'deleteWaffle'])->name('waffle.delete');


// Room Management
Route::get('/admin/room', [AdminroomsController::class, 'index'])->name('room.show');
Route::get('/admin/room-add', [AdminroomsController::class, 'addroom'])->name('room.add');
Route::post('/admin/room-add', [AdminroomsController::class, 'submitroomRecord']);
Route::get('/admin/room-edit/{id}', [AdminroomsController::class, 'editroom'])->name('room.edit');
Route::put('/admin/room-edit/{id}', [AdminroomsController::class, 'updateroom'])->name('room.update');
Route::delete('/admin/room-delete/{id}', [AdminroomsController::class, 'deleteroom'])->name('room.delete');

//Fitem Managemet

Route::get('/admin/fitem', [Fitemcontroller::class, 'index'])->name('fitem.show');
Route::get('/admin/fitem-add', [Fitemcontroller::class, 'create'])->name('fitem.add');
Route::post('/admin/fitem-add', [Fitemcontroller::class, 'store'])->name('fitem.store');
Route::get('/admin/fitem-edit/{id}', [Fitemcontroller::class, 'edit'])->name('fitem.edit');
Route::put('/admin/fitem-update/{id}', [Fitemcontroller::class, 'update'])->name('fitem.update');
Route::delete('/admin/fitem-delete/{id}', [Fitemcontroller::class, 'destroy'])->name('fitem.delete');

// Project Management

Route::get('/admin/projects', [AdminProjectsController::class, 'index'])->name('project.add');
Route::get('/admin/project-add', [AdminProjectsController::class, 'addProject'])->name('project.add');
Route::post('/admin/project-add', [AdminProjectsController::class, 'submitProjectRecord']);
Route::get('/admin/project-edit/{id}', [AdminProjectsController::class, 'editProject'])->name('project.edit');
Route::put('/admin/project-edit/{id}', [AdminProjectsController::class, 'updateProject'])->name('project.update');
Route::delete('/admin/project-delete/{id}', [AdminProjectsController::class, 'deleteProject'])->name('project.delete');


Route::get('admin/logout', function(){
    if(session()->has('email')){
        session()->pull('id', null);
        session()->pull('first_name', null);
        session()->pull('last_name', null);
        session()->pull('email', null);
    }
        return redirect('/admin/login');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

