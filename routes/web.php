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

    // All Users view
    Route::get('/viewusers', [UserController::class, 'usersView'])->middleware(['auth:admin', 'verified'])->name('showUsers');
    // Users details view
    Route::get('/viewusers/{id}', [UserController::class, 'usersDetails'])->middleware(['auth:admin', 'verified']);
    // edit page view
    Route::get('/viewusers/edit/{id}', [UserController::class, 'adminUserProfileEditView'])->middleware(['auth:admin', 'verified'])->name('userProfileEditviewbyadmin');
    // edit
    Route::post('/viewusers/update/{id}', [UserController::class, 'adminUserUpdate'])->middleware(['auth:admin', 'verified'])->name('userProfileUpdatebyadmin');
    
    // Admin User Delete
    Route::get('/viewusers/{id}', [UserController::class, 'deleteUsers'])->middleware(['auth:admin', 'verified']);


    // Approve/inapprove 
    Route::get('/view/status/{status}/{id}', [UserController::class, 'UserStatus'])->middleware(['auth:admin', 'verified']);



    // All cases view
    Route::get('/viewcases', [UserCaseController::class, 'showAllcases'])->middleware(['auth:admin', 'verified'])->name('all.cases');
    // Case Details View
    Route::get('/viewcases/{id}', [UserCaseController::class, 'caseDetails'])->middleware(['auth:admin', 'verified']);

    
});

require __DIR__.'/adminauth.php';