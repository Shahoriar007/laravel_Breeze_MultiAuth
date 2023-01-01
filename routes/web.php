<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\UserCaseController;
use App\Http\Controllers\UserSupportController;
use App\Http\Controllers\Auth\RegisteredUserController;


Route::get('/', function () {
    return view('welcome');
})->name('main.home');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [UserController::class, 'dashboardView'])->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/', [RegisteredUserController::class, 'transactionid'])->middleware(['auth', 'verified'])->name('tranlogin');

// profile page view
Route::get('/dashboard/profile', [UserController::class, 'profileView'])->middleware(['auth', 'verified'])->name('profilePage');
// edit page view
Route::get('/dashboard/edit/{id}', [RegisteredUserController::class, 'userEdit'])->middleware(['auth', 'verified'])->name('userProfileEdit');
// edit
Route::post('/dashboard/update/{id}', [RegisteredUserController::class, 'userUpdate'])->middleware(['auth', 'verified'])->name('userProfileUpdate');

// Case Report View
Route::get('/dashboard/casereport', [UserCaseController::class, 'caseReportFormView'])->middleware(['auth', 'verified'])->name('caseReport');
// Case Submit Form
Route::post('/dashboard/{id}', [UserCaseController::class, 'caseStore'])->middleware(['auth', 'verified'])->name('caseSubmit');

// User Support page view
Route::get('/dashboard/support/{id}', [UserSupportController::class, 'userSupportMsgView'])->middleware(['auth', 'verified'])->name('userSupport');

Route::post('/dashboard/support/{id}', [UserSupportController::class, 'userSupportMsgSend'])->middleware(['auth', 'verified'])->name('userSupportMsgPost');


require __DIR__.'/auth.php';


// Admin

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth:admin', 'verified'])->name('admin.dashboard');


// Admin view
Route::prefix('admin')->group(function(){

    // All Users view
    Route::get('/viewusers', [UserController::class, 'usersView'])->middleware(['auth:admin', 'verified'])->name('showUsers');
    // Admin add user page view
    Route::get('/adduser', [RegisteredUserController::class, 'usersAddByAdminView'])->middleware(['auth:admin', 'verified'])->name('adminAddUser');
    // Admin add user page view
    Route::post('/adduser', [RegisteredUserController::class, 'usersAddByAdminForm'])->middleware(['auth:admin', 'verified'])->name('adminAddUserForm');
    // Users details view
    Route::get('/viewusers/{id}', [UserController::class, 'usersDetails'])->middleware(['auth:admin', 'verified']);
    // edit page view
    Route::get('/viewusers/edit/{id}', [UserController::class, 'adminUserProfileEditView'])->middleware(['auth:admin', 'verified'])->name('userProfileEditviewbyadmin');
    // edit
    Route::post('/viewusers/update/{id}', [UserController::class, 'adminUserUpdate'])->middleware(['auth:admin', 'verified'])->name('userProfileUpdatebyadmin');
    // Admin User Delete
    Route::get('/viewusers/delete/{id}', [UserController::class, 'deleteUsers'])->middleware(['auth:admin', 'verified']);


    // Approve/inapprove 
    Route::get('/view/status/{status}/{id}', [UserController::class, 'UserStatus'])->middleware(['auth:admin', 'verified']);



    // All cases view
    Route::get('/viewcases', [UserCaseController::class, 'showAllcases'])->middleware(['auth:admin', 'verified'])->name('all.cases');
    // Case Details View
    Route::get('/viewcases/{id}', [UserCaseController::class, 'caseDetails'])->middleware(['auth:admin', 'verified']);

    // All cases view
    Route::get('/admin_support', [UserSupportController::class, 'adminSupportChatView'])->middleware(['auth:admin', 'verified'])->name('allSupportMsg');

    // All msg of a user view
    Route::get('/support_support/{id}', [UserSupportController::class, 'adminSupportChatViewMsg'])->middleware(['auth:admin', 'verified'])->name('adminSupportMsg');

    Route::post('/support_support/{id}', [UserSupportController::class, 'adminSupportMsgPost'])->middleware(['auth:admin', 'verified'])->name('adminSupportMsgPost');


    
});




require __DIR__.'/adminauth.php';