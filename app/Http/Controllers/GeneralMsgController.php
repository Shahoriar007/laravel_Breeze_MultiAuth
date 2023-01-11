<?php

namespace App\Http\Controllers;

use App\Models\GeneralMsg;
use Illuminate\Http\Request;

class GeneralMsgController extends Controller
{

    // Admin General Msg view Page
    public function adminGeneralMsgView($id)
    {

        $generalMsg = GeneralMsg::where('userId','=', $id)->latest()->get();

        return view('adminGeneralMsg', compact('generalMsg','id'));
    }

    public function adminGeneralMsgPost(Request $request,$id)
    {
        GeneralMsg::create([
            'userId' => $id,
            'msgText' => $request->msgText,
         ]);

         $notification = array(
            'message' => 'Massage sent!',
            'alert-type' => 'success'
        );

        return redirect()->route('adminGeneralMsg',$id)->with($notification);
    }

    // Delete general msg
    public function adminGeneralMsgDelete($id,$caseId)
    {
        GeneralMsg::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Massage deleted!',
            'alert-type' => 'success'
        );

        return redirect()->route('adminGeneralMsg',$caseId)->with($notification);
    }

    // ----------------------------------User Side---------------------------------------------------

    public function userGeneralMsgView($id)
    {
        $generalMsg = GeneralMsg::where('userId','=', $id)->latest()->get();

        return view('userGeneralMsg', compact('generalMsg'));
    }
    
}
