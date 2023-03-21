<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Casefine;
use App\Models\TempCasefine;
use App\Models\UserCaseChat;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Support\Facades\Auth;


use Image;

class UserCaseController extends Controller
{
    // -----------------------------------------User Side-------------------------------

    // Case submit form view
    public function caseReportFormView(){
        return view('caseReport');
    }

    // case submit form
    public function caseStore(Request $request, $id ){

        $request->validate([

            // Validation 
            'caseId' => 'required',
            'caseCode' => 'required',
            'casePhoto' => 'required|max:2048',

        ],[
            'caseId.required' => 'Please fillup this field',
            'caseCode.required' => 'Please fillup this field',
            'casePhoto.required' => 'Please fillup this field',
        ]);

         //  Image name genarate, resize and save in a folder
         $image = $request->file('casePhoto');
         $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
         Image::make($image)->save('upload/case_images/'.$name_gen);
         $save_url = 'upload/case_images/'.$name_gen;

         TempCasefine::create([

            'userId' => $id,
            'caseId' => $request->caseId,
            'caseCode' => $request->caseCode,
            'fineAmmount' => $request->fineAmmount,
            'casePhoto' =>  $save_url,
   
         ]);

         $notification = array(
            'message' => 'Case submitted succesfully',
            'alert-type' => 'success'
        );

          return redirect()->route('payFirst')->with($notification);

         //return redirect()->route('dashboard')->with($notification);
    
    }

    // 
    public function payfirst(){

        $caseDetails = TempCasefine::where('userId','=',Auth::guard('web')->user()->id)->latest()->first();

        // 50% of case fine 
        $dueAmmount = $caseDetails->caseCode / 2;

        return view('payFirst', compact('caseDetails','dueAmmount'));

    }

    // case submit form
    public function postCaseAfterpay(Request $request ){

        $caseDetails = TempCasefine::where('userId','=',Auth::guard('web')->user()->id)->latest()->first();

        $status = "Pending";

         Casefine::create([

            'userId' => $caseDetails->userId,
            'caseId' => $caseDetails->caseId,
            'caseCode' => $caseDetails->caseCode,
            'fineAmmount' => $caseDetails->fineAmmount,
            'casePhoto' =>  $caseDetails->casePhoto,
            'caseStatus' => $status,
            'paidWith' => $request->paidWith,
            'trId' => $request->trId,
   
         ]);

         TempCasefine::where('userId','=',Auth::guard('web')->user()->id)->latest()->first()->delete();

         return redirect()->route('dashboard');
    
    }


    // User all submitted case view table
    public function userAllCasesView($id){

        $usersAllCases = Casefine::where('userId','=',$id)->latest()->get();

        return view('allSubmittedCase',compact('usersAllCases'));

    }
    // User Case Details
    public function userCaseDetails($id){

        $usersAllCasesDetails = Casefine::findOrFail($id);
        $usersCaseChat = UserCaseChat::where('caseId','=', $id)->get();

        return view('userCaseDetails',compact('usersAllCasesDetails','usersCaseChat'));

    }

    




    // -----------------------------------------Admin Side-------------------------------

    // all cases view table
    public function showAllcases(){
        $cases = Casefine::all();

        return view('cases_view',compact('cases'));
    }

    // cases details view 
    public function caseDetails( $id ){

        $caseDetails = Casefine::find($id);
        $usersCaseChat = UserCaseChat::where('caseId','=', $id)->get();

        return view('case_details', compact('caseDetails','usersCaseChat'));

    }

    // cases delete
    public function caseDeleteAdmin( $id ){

        Casefine::findOrFail($id)->delete();
        return redirect()->route('all.cases');

    }

    // Admin user Case Status update
    public function caseStatusUpdate(Request $request, $id){

        $case = Casefine::find($id);
        $case->caseStatus = $request->caseStatus;

        $case->save();

        $notification = array(
            'message' => 'Case status updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('allCasesDetailsAdmin',$id)->with($notification);

    }

    // Generate Case PDF
    public function generateCasePdf($id){

        $caseDetails = Casefine::find($id);

        $data = array(
            "id"=>$caseDetails->id,
            "userId"=>$caseDetails->userId,
            "caseId"=>$caseDetails->caseId,
            "caseCode"=>$caseDetails->caseCode,
            "fineAmmount"=>$caseDetails->fineAmmount,
            "caseStatus"=>$caseDetails->caseStatus,
            "paidWith"=>$caseDetails->paidWith,
            "trId"=>$caseDetails->trId,

        );

        $pdf = Pdf::loadView('downloadCase', compact('data'));
        return $pdf->download();

    }

    // Admin Case Invoice View
    public function downloadInvAdmin($id){

        $caseDetails = Casefine::find($id);

        // 50% of case fine 
        $dueAmmount = $caseDetails->caseCode / 2;

        return view('userInvoicePage', compact('caseDetails','dueAmmount'));
    }

    // Admin Case Invoice View
    public function downloadInvAdminPDF($id){

        $caseDetails = Casefine::find($id);

        // 50% of case fine 
        $dueAmmount = $caseDetails->caseCode / 2;

        $invdata = array(
            "id"=>$caseDetails->id,
            "userId"=>$caseDetails->userId,
            "caseId"=>$caseDetails->caseId,
            "caseCode"=>$caseDetails->caseCode,
            "newcaseCode"=>$dueAmmount,
            "fineAmmount"=>$caseDetails->fineAmmount,
            "caseStatus"=>$caseDetails->caseStatus,
            "created_at"=>$caseDetails->created_at,
            

        );

        $pdf = Pdf::loadView('downloadCaseInvoice', compact('invdata'));
        return $pdf->download();

    }

    // all pendingcases view table
    public function showAllPendingCases(){

        $pendingCase = Casefine::where('caseStatus','=',"pending")->get();

        return view('pendingCase',compact('pendingCase'));
    }

    // all completed cases view table
    public function showAllCompletedCases(){

        $completedCase = Casefine::where('caseStatus','=',"done")->get();

        return view('completedCase',compact('completedCase'));
    }

    // all cancled cases view table
    public function showAllCancledCases(){

        $cancledCase = Casefine::where('caseStatus','=',"cancle")->get();

        return view('cancledCase',compact('cancledCase'));
    }

    // manage case doc view table
    public function manageCaseDocView(){

        $caseDoc = Casefine::all();

        return view('manageCaseDoc',compact('caseDoc'));
    }



}
