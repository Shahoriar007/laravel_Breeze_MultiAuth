<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\UserCaseController;
use App\Http\Controllers\Auth\RegisteredUserController;


Route::get('/', function () {
    return view('welcome');
})->name('main.home');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [UserController::class, 'dashboardView'])->middleware(['auth', 'verified'])->name('dashboard');

// profile page view
Route::get('/dashboard/profile', [UserController::class, 'profileView'])->middleware(['auth', 'verified'])->name('profilePage');
// edit page view
Route::get('/dashboard/edit/{id}', [RegisteredUserController::class, 'userEdit'])->middleware(['auth', 'verified'])->name('userProfileEdit');
// edit
Route::post('/dashboard/update/{id}', [RegisteredUserController::class, 'userUpdate'])->middleware(['auth', 'verified'])->name('userProfileUpdate');

// Case
// Case Submit Form
Route::post('/dashboard/{id}', [UserCaseController::class, 'caseStore'])->middleware(['auth', 'verified'])->name('caseSubmit');


require __DIR__.'/auth.php';


// Admin

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth:admin', 'verified'])->name('admin.dashboard');

// Admin dashboard
Route::get('/dashboard', [UserController::class, 'dashboardView'])->middleware(['auth', 'verified'])->name('dashboard');

// Admin view
Route::prefix('admin')->group(function(){

    Route::get('/viewusers', [UserController::class, 'usersView'])->middleware(['auth:admin', 'verified'])->name('showUsers');

    // Approve/inapprove 
    Route::get('/view/status/{status}/{id}', [UserController::class, 'UserStatus'])->middleware(['auth:admin', 'verified']);

    // All cases view
    Route::get('/viewcases', [UserCaseController::class, 'showAllcases'])->middleware(['auth:admin', 'verified'])->name('all.cases');

    Route::get('/viewcases/{id}', [UserCaseController::class, 'caseDetails'])->middleware(['auth:admin', 'verified']);

    
});

require __DIR__.'/adminauth.php';