<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Casefine;
use App\Models\UserCaseChat;
use Barryvdh\DomPDF\Facade\Pdf;


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
            'casePhoto' => 'required',

        ],[
            'caseId.required' => 'Please fillup this field',
            'caseCode.required' => 'Please fillup this field',
            'casePhoto.required' => 'Please fillup this field',
        ]);

         //  Image name genarate, resize and save in a folder
         $image = $request->file('casePhoto');
         $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
         Image::make($image)->resize(300,300)->save('upload/case_images/'.$name_gen);
         $save_url = 'upload/case_images/'.$name_gen;

         Casefine::create([

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

         return redirect()->route('dashboard')->with($notification);
    
    }

    // User all submitted case view table
    public function userAllCasesView($id){

        $usersAllCases = Casefine::where('userId','=',$id)->get();

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
        $cases = Casefine::latest()->paginate(10);
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

        );

        $pdf = Pdf::loadView('downloadCase', compact('data'));
        return $pdf->download();

    }

    // Generate Admin Case Invoice PDF
    public function downloadInvAdmin($id){

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

}
