<?php

namespace App\Http\Controllers;

use App\Models\UserCaseChat;
use Illuminate\Http\Request;

class UserCaseChatController extends Controller
{
   

// User Case Msg post
public function userAllCaseMsgPost(Request $request, $id ){

    UserCaseChat::create([
        'caseId' => $id,
        'caseMsgText' => $request->caseMsgText,
        'caseMsgSender' => "u",
     ]);

    return redirect()->route('allCasesDetails',$id);

}

// Admin section---------------------------------------------------------------------

// User Case Msg post
public function adminAllCaseMsgPost(Request $request, $id ){

    UserCaseChat::create([
        'caseId' => $id,
        'caseMsgText' => $request->caseMsgText,
        'caseMsgSender' => "a",
     ]);

    return redirect()->route('allCasesDetailsAdmin',$id);

}

}
