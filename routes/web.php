<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\UserCaseController;
use App\Http\Controllers\UserSupportController;
use App\Http\Controllers\GeneralMsgController;
use App\Http\Controllers\UserDesignationController;
use App\Http\Controllers\UserCaseChatController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\GenenralCaseMsgController;
use App\Http\Controllers\UserPaymentHistoryController;
use App\Http\Controllers\TermsConditionController;
use App\Http\Controllers\TranningBranchController;
use App\Http\Controllers\BkashPaymentController;
use App\Http\Controllers\BkashPaymentforRegController;

use App\Http\Controllers\Auth\RegisteredUserController;



Route::get('/', function () {
    return view('welcome');
})->name('main.home');

// Route::get('/termsCondition', function () {
//     return view('termsConditionView');
// })->name('termsCondition');

Route::get('/termsCondition', [TermsConditionController::class, 'userTermsConditionView'])->name('termsCondition');

// Training Branch View User
Route::get('/tranningBranch',[TranningBranchController::class, 'userView'])->name('userTranningBranch');

Route::get('/passwordRecover', function () {
    return view('userPasswordRecover');
})->name('userPasswordRecover');

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
// User Support msg send
Route::post('/dashboard/support/{id}', [UserSupportController::class, 'userSupportMsgSend'])->middleware(['auth', 'verified'])->name('userSupportMsgPost');

// User Support page view
Route::get('/dashboard/generalCase/{id}', [GenenralCaseMsgController::class, 'userGeneralCaseView'])->middleware(['auth', 'verified'])->name('generalCase');
// User Support msg send
Route::post('/dashboard/generalCase/{id}', [GenenralCaseMsgController::class, 'userGeneralCasePost'])->middleware(['auth', 'verified'])->name('userGeneralCasePost');

// User Status view
Route::get('/dashboard/status/{id}', [UserController::class, 'userStatusView'])->middleware(['auth', 'verified'])->name('userStatus');

// User Payment History view
Route::get('/dashboard/paymentHistory/{id}', [UserPaymentHistoryController::class, 'paymentHistoryView'])->middleware(['auth', 'verified'])->name('paymentHistory');

//User all submitted case view table
Route::get('/dashboard/allcases/{id}', [UserCaseController::class, 'userAllCasesView'])->middleware(['auth', 'verified'])->name('allCases');
// User Case Details View
Route::get('/dashboard/userViewcases/{id}', [UserCaseController::class, 'userCaseDetails'])->middleware(['auth', 'verified'])->name('allCasesDetails');
// User Case Details msg post
Route::post('/dashboard/userViewcases/{id}', [UserCaseChatController::class, 'userAllCaseMsgPost'])->middleware(['auth', 'verified'])->name('userCaseMsgPost');

// General Msg View
Route::get('/dashboard/generalMsg/{id}', [GeneralMsgController::class, 'userGeneralMsgView'])->middleware(['auth', 'verified'])->name('userGeneralMsg');

// invoice Page view(User) 
Route::get('generate-invoicepdf/{id}',[UserCaseController::class, 'downloadInvAdmin'])->middleware(['auth', 'verified'])->name('downloadInvoiceUser');

Route::get('download-invoicepdf/{id}',[UserCaseController::class, 'downloadInvAdminPDF'])->middleware(['auth', 'verified'])->name('downloadInvoicePDFUser');

// Bkash Payment For case
Route::post('/getToken', [BkashPaymentController::class, 'getToken'])->name('getToken');

Route::post('/executePayment', [BkashPaymentController::class, 'executePayment'])->name('executePayment');

// Bkash paymet for register
Route::post('/getTokenReg', [BkashPaymentforRegController::class, 'getTokenReg'])->name('getTokenReg');
Route::post('/executePaymentReg', [BkashPaymentforRegController::class, 'executePaymentReg'])->name('executePaymentReg');


require __DIR__.'/auth.php';


// Admin view
Route::prefix('admin')->group(function(){

    // Admin Dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'adminDashboard'])->middleware(['auth:admin', 'verified'])->name('admin.dashboard');

    // Admin Password Change View
    Route::get('/changePassword', [AdminDashboardController::class, 'adminChangePassword'])->middleware(['auth:admin', 'verified'])->name('adminChangePass');
    Route::post('/checkchangePassword', [AdminDashboardController::class, 'adminCheckChangePassword'])->middleware(['auth:admin', 'verified'])->name('checkchangePassword');
    // All Users view
    Route::get('/viewusers', [UserController::class, 'usersView'])->middleware(['auth:admin', 'verified'])->name('showUsers');
    // All Users view short table
    Route::get('/viewusersShort', [UserController::class, 'usersViewShort'])->middleware(['auth:admin', 'verified'])->name('showUsersShort');
    // Admin add user page view
    Route::get('/adduser', [RegisteredUserController::class, 'usersAddByAdminView'])->middleware(['auth:admin', 'verified'])->name('adminAddUser');
    // Admin add user page view
    Route::post('/adduser', [RegisteredUserController::class, 'usersAddByAdminForm'])->middleware(['auth:admin', 'verified'])->name('adminAddUserForm');
    // Admin add user designation view
    Route::get('/add_Designation', [UserDesignationController::class, 'usersDesignationAddView'])->middleware(['auth:admin', 'verified'])->name('adminAddUserDgn');
    // Admin add user designation form post
    Route::post('/add_Designation', [UserDesignationController::class, 'usersDesignationAddform'])->middleware(['auth:admin', 'verified'])->name('adminAddUserDgnForm');
    // Admin can delete user designation
    Route::get('/add_Designation/{id}', [UserDesignationController::class, 'usersDesignationDelete'])->middleware(['auth:admin', 'verified'])->name('adminDeleteUserDgn');
    // Users details view
    Route::get('/viewusers/{id}', [UserController::class, 'usersDetails'])->middleware(['auth:admin', 'verified'])->name('userDetails');
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
    Route::get('/viewcases/{id}', [UserCaseController::class, 'caseDetails'])->middleware(['auth:admin', 'verified'])->name('allCasesDetailsAdmin');
    // Case Details View
    Route::get('/caseDelete/{id}', [UserCaseController::class, 'caseDeleteAdmin'])->middleware(['auth:admin', 'verified']);
    // case details status update
    Route::post('/viewcases/status/{id}', [UserCaseController::class, 'caseStatusUpdate'])->middleware(['auth:admin', 'verified'])->name('adminUpdateCaseStatus');

    // Admin Case Details msg post
    Route::post('/viewcases/{id}', [UserCaseChatController::class, 'adminAllCaseMsgPost'])->middleware(['auth:admin', 'verified'])->name('adminCaseMsgPost');

    // All Pending case view
    Route::get('/viewPendingCases', [UserCaseController::class, 'showAllPendingCases'])->middleware(['auth:admin', 'verified'])->name('all.pendingCases');

    // All completed case view
    Route::get('/viewComopletedCases', [UserCaseController::class, 'showAllCompletedCases'])->middleware(['auth:admin', 'verified'])->name('all.completedCases');

    // All cancled case view
    Route::get('/viewCancledCases', [UserCaseController::class, 'showAllCancledCases'])->middleware(['auth:admin', 'verified'])->name('all.cancledCases');

    // manage Case doc 
    Route::get('/manageCaseDoc', [UserCaseController::class, 'manageCaseDocView'])->middleware(['auth:admin', 'verified'])->name('manageCaseDoc');


    // Support
    // Support view
    Route::get('/admin_support', [UserSupportController::class, 'adminSupportChatView'])->middleware(['auth:admin', 'verified'])->name('allSupportMsg');

    // All msg of a user view
    Route::get('/support_support/{id}', [UserSupportController::class, 'adminSupportChatViewMsg'])->middleware(['auth:admin', 'verified'])->name('adminSupportMsg');

    // Indivusual user msg show
    Route::post('/support_support/{id}', [UserSupportController::class, 'adminSupportMsgPost'])->middleware(['auth:admin', 'verified'])->name('adminSupportMsgPost');

    // Indivusual user msg show
    Route::post('/search', [UserSupportController::class, 'adminSupportMsgPostSrc'])->middleware(['auth:admin', 'verified'])->name('adminSupportMsgSearch');


    // General Case
    // General Case View
    Route::get('/admin_generalCase', [GenenralCaseMsgController::class, 'generalCaseChatView'])->middleware(['auth:admin', 'verified'])->name('allGeneralCaseMsg');

    // All General Case of a user view
    Route::get('/general_case/{id}', [GenenralCaseMsgController::class, 'adminGeneralCaseViewMsg'])->middleware(['auth:admin', 'verified'])->name('adminGeneralCaseMsg');

    // Indivusual user msg show
    Route::post('/general_case/{id}', [GenenralCaseMsgController::class, 'adminGeneralCasePost'])->middleware(['auth:admin', 'verified'])->name('adminGeneralCasePost');

    // Indivusual user msg show
    Route::post('/searchGeneralCaseMsg', [GenenralCaseMsgController::class, 'adminGeneralCasePostSrc'])->middleware(['auth:admin', 'verified'])->name('adminGeneralCaseMsgSearch');


    // All msg of a user view
    Route::get('/generalMsg/{id}', [GeneralMsgController::class, 'adminGeneralMsgView'])->middleware(['auth:admin', 'verified'])->name('adminGeneralMsg');

    // general msg post form
    Route::post('/generalMsg/{id}', [GeneralMsgController::class, 'adminGeneralMsgPost'])->middleware(['auth:admin', 'verified'])->name('adminGeneralMsgPost');

    // Admin general msg delete
    Route::get('/generalMsg/delete/{id}/{caseId}', [GeneralMsgController::class, 'adminGeneralMsgdelete'])->middleware(['auth:admin', 'verified'])->name('adminGeneralMsgDelete');

    // Generate Case details PDF
    Route::get('generate-pdf/{id}',[UserCaseController::class, 'generateCasePdf'])->name('generatePdf');

    // Generate User details PDF
    Route::get('generate-userpdf/{id}',[UserController::class, 'generateUserPdf'])->name('generateUserPdf');

    // Download invoice (admin) 
    Route::get('generate-invoicepdf/{id}',[UserCaseController::class, 'downloadInvAdmin'])->name('downloadInvoiceAdmin');

    // Admin Employee List
    Route::get('employeeList/',[AdminDashboardController::class, 'employeeListTable'])->name('adminEmployeeList');

    // Admin Car Chalok List
    Route::get('carChalokList/',[AdminDashboardController::class, 'carChalokTable'])->name('adminCarChalokList');

    // Admin Bike Chalok List
    Route::get('bikeChalokList/',[AdminDashboardController::class, 'bikeChalokTable'])->name('adminBikeChalokList');

    // Admin CNG Chalok List
    Route::get('cngChalokList/',[AdminDashboardController::class, 'cngChalokTable'])->name('adminCngChalokList');

    // Admin Bus Chalok List
    Route::get('busChalokList/',[AdminDashboardController::class, 'busChalokTable'])->name('adminBusChalokList');

    // Admin Truck Chalok List
    Route::get('truckChalokList/',[AdminDashboardController::class, 'truckChalokTable'])->name('adminTruckChalokList');

    // Admin Pickup Chalok List
    Route::get('pickupChalokList/',[AdminDashboardController::class, 'pickupChalokTable'])->name('adminPickupChalokList');

    // Admin Terms Condition View
    Route::get('termsCondition/',[TermsConditionController::class, 'index'])->name('termsConditionView');

    Route::post('termsCondition/',[TermsConditionController::class, 'create'])->name('termsConditionPost');

    // Tranning Branch View Admin
    Route::get('tranningBranch/',[TranningBranchController::class, 'index'])->name('tranningBranch');

    Route::post('tranningBranch/',[TranningBranchController::class, 'create'])->name('addTranningBranch');

    Route::get('tranningBranchdelete/{id}',[TranningBranchController::class, 'delete'])->name('deleteTranningBranch');

    // User Creators Position
    Route::get('userCreatorsPosition/',[AdminDashboardController::class, 'viewUsersCreatorsPosition'])->name('userCreatorsPosition');
    Route::post('userCreatorsPosition/',[AdminDashboardController::class, 'viewUsersCreatorsPositionSearch'])->name('userCreatorsPositionSearch');


    Route::get('payfirst/',[UserCaseController::class, 'payfirst'])->name('payFirst');

    Route::post('postCaseAfterPay/',[UserCaseController::class, 'postCaseAfterpay'])->name('postCaseAfterPay');

    Route::post('postCaseAfterpayWithBkash/',[UserCaseController::class, 'postCaseAfterpayWithBkash'])->name('postCaseAfterpayWithBkash');

    
    



    
});




require __DIR__.'/adminauth.php';