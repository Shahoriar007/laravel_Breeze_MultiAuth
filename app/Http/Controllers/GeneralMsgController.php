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

        return redirect()->route('adminGeneralMsg',$id);
    }

    // ----------------------------------User Side---------------------------------------------------

    public function userGeneralMsgView($id)
    {
        $generalMsg = GeneralMsg::where('userId','=', $id)->latest()->get();

        return view('userGeneralMsg', compact('generalMsg'));
    }



    
}
