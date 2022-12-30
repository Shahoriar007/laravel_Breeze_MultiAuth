<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Casefine;


use Image;

class UserCaseController extends Controller
{
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

    // all cases view classes
    public function showAllcases(){
        $cases = Casefine::latest()->paginate(10);
        return view('cases_view',compact('cases'));
    }

    // cases details view classes
    public function caseDetails( $id ){

        $caseDetails = Casefine::find($id);

        return view('case_details', compact('caseDetails'));

    }
}
