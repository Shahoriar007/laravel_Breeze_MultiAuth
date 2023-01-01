<?php

namespace App\Http\Controllers;

use App\Models\UserSupportChat;
use Illuminate\Http\Request;

class UserSupportController extends Controller
{
    // User Support Msg Section View
    public function userSupportMsgView( $id ){

        $usersChat = UserSupportChat::where('userId','=', $id)->latest()->get();

        return view('user_support', compact('usersChat'));

    }

    // User msg send
    public function userSupportMsgSend(Request $request, $id ){

        UserSupportChat::create([
            'userId' => $id,
            'msgText' => $request->msgText,
         ]);

        return redirect()->route('userSupport',$id);

    }

    public function adminSupportChatView(){

        $usersChatAll = UserSupportChat::where('sender','=','u')->latest()->get();

         return view('adminSupport',compact('usersChatAll'));

    }

    public function adminSupportChatViewMsg($id){

        $usersChat = UserSupportChat::where('userId','=', $id)->latest()->get();

        $usersChatAll = UserSupportChat::where('sender','=','u')->latest()->get();

         return view('adminSupport',compact('usersChatAll','usersChat'));

    }

    public function adminSupportMsgPost(Request $request, $id ){

        

        UserSupportChat::create([
            'userId' => $id,
            'msgText' => $request->msgText,
            'sender' => "a",
         ]);

        return redirect()->route('adminSupportMsg',$id);

    }
}
