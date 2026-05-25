<?php

// //frontend
use App\Http\Controllers\frontend\IndexController;
use App\Http\Controllers\frontend\AboutController;
use App\Http\Controllers\frontend\contactcontroller;
use App\Http\Controllers\frontend\maincontroller;
use App\Http\Controllers\frontend\roomlistcontroller;
use App\Http\Controllers\frontend\pricingcontroller;
use App\Http\Controllers\frontend\servicesdetailscontroller;
use App\Http\Controllers\frontend\servicesteamcontroller;
use App\Http\Controllers\frontend\RoomController;
use App\Http\Controllers\frontend\BookingController;
use App\Http\Controllers\frontend\BlogController;
use App\Http\Controllers\frontend\ChatbotController;
use App\Http\Controllers\frontend\AiSuggestionController;
use App\Http\Controllers\frontend\ReviewController;
use Illuminate\Support\Facades\Route;

//Backend controller
use App\Http\Controllers\backend\AdminLoginController;
use App\Http\Controllers\backend\AdminHomeController;
use App\Http\Controllers\backend\AdminProjectsController;
use App\Http\Controllers\backend\TeamMemberController;
use App\Http\Controllers\backend\AdminFaqsController;
use App\Http\Controllers\backend\AdminReviewController;
use App\Http\Controllers\backend\AdminShopController;
use App\Http\Controllers\backend\AdminBookingController;
use App\Http\Controllers\backend\AdminroomsController;
use App\Http\Controllers\backend\AdminCartController;

#Frontend

Route::get('/', [IndexController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);
Route::get('/roomdetails/{id}', [RoomController::class, 'show'])->name('room.details');
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/{slug}', [BlogController::class, 'show'])->name('blogs.show');
Route::get('/blogdetails', [BlogController::class, 'index']);
Route::get('/blogdetails/{slug}', [BlogController::class, 'show']);
Route::get('/main', [maincontroller::class, 'index']);
Route::get('/roomlist', [roomlistcontroller::class, 'index']);
Route::get('/pricing', [pricingcontroller::class, 'index']);
Route::get('/servicesdetails', [servicesdetailscontroller::class, 'index']);
Route::get('/servicesteam', [servicesteamcontroller::class, 'index']);
Route::get('/contact', [contactcontroller::class, 'index']);
Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
Route::post('/contact', [contactcontroller::class, 'store'])->name('contact.store');
// Booking page (global + room specific)
Route::get('/book', [BookingController::class, 'index'])->name('booking.index');
Route::get('/book/{id}', [BookingController::class, 'index'])->name('book.room');
Route::post('/book-room', [BookingController::class, 'store'])->name('book.room');
Route::get('/booking-success', [BookingController::class, 'success'])->name('booking.success');
Route::get('/search-rooms', [RoomController::class, 'search'])->name('search.rooms');

// Chatbot Route
Route::post('/chatbot/message', [ChatbotController::class, 'sendMessage'])->name('chatbot.message');

// AI Suggestion Routes
Route::get('/ai-suggestion', [AiSuggestionController::class, 'index'])->name('ai.suggest.form');
Route::post('/ai-suggestion', [AiSuggestionController::class, 'suggest'])->name('ai.suggest');
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

Route::get('/admin/team', [TeamMemberController::class, 'index']);
Route::get('/admin/team-add', [TeamMemberController::class, 'create']);
Route::post('/admin/team-add', [TeamMemberController::class, 'store']);
Route::get('/admin/team-delete/{id}', [TeamMemberController::class, 'destroy']);
// Frontend
Route::get('/team', [servicesteamcontroller::class, 'index']);

// Reviews Management
Route::get('/admin/reviews', [AdminReviewController::class, 'index'])->name('review.show');
Route::get('/admin/review-add', [AdminReviewController::class, 'addReview'])->name('review.add');
Route::post('/admin/review-add', [AdminReviewController::class, 'submitReviewRecord']);
Route::get('/admin/review-edit/{id}', [AdminReviewController::class, 'editReview'])->name('review.edit');
Route::put('/admin/review-edit/{id}', [AdminReviewController::class, 'updateReview'])->name('review.update');
Route::patch('/admin/review-approve/{id}', [AdminReviewController::class, 'approveReview'])->name('review.approve');
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

// Bookings Management
Route::get('/admin/bookings', [AdminBookingController::class, 'index'])->name('booking.show');
Route::redirect('/admin/homeproducts', '/admin/bookings');

// Room Management
Route::get('/admin/room', [AdminroomsController::class, 'index'])->name('room.show');
Route::get('/admin/room-add', [AdminroomsController::class, 'addroom'])->name('room.add');
Route::post('/admin/room-add', [AdminroomsController::class, 'submitroomRecord']);
Route::get('/admin/room-edit/{id}', [AdminroomsController::class, 'editroom'])->name('room.edit');
Route::put('/admin/room-edit/{id}', [AdminroomsController::class, 'updateroom'])->name('room.update');
Route::delete('/admin/room-delete/{id}', [AdminroomsController::class, 'deleteroom'])->name('room.delete');

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
