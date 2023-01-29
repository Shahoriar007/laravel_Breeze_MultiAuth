<?php

namespace App\Http\Controllers;

use App\Models\UserSupportChat;
use App\Models\User;
use Illuminate\Http\Request;

class UserSupportController extends Controller
{
    // User Support Msg Section View
    public function userSupportMsgView( $id ){

        $usersChat = UserSupportChat::where('userId','=', $id)->get();

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

    // Admin all msg view
    public function adminSupportChatView(){

        $usersChatAll = UserSupportChat::where('sender','=','u')->latest()->get();

         return view('adminSupportNoid',compact('usersChatAll'));

    }

    // Admin all msg view with chat get
    public function adminSupportChatViewMsg($id){

        $usersChat = UserSupportChat::where('userId','=', $id)->get();

        $userNameSend = User::find($id);

        $usersChatAll = UserSupportChat::where('sender','=','u')->latest()->get();

         return view('adminSupport',compact('usersChatAll','userNameSend','usersChat'));

    }

    // Admin send msg
    public function adminSupportMsgPost(Request $request, $id ){

        UserSupportChat::create([
            'userId' => $id,
            'msgText' => $request->msgText,
            'sender' => "a",
         ]);

        return redirect()->route('adminSupportMsg',$id);

    }

    // Admin all msg view with chat get
    public function adminSupportMsgPostSrc(Request $request){

        $userIdfilter = User::where('name','=', $request->name)->orwhere('phone','=', $request->name)->get();

        if( count($userIdfilter) > 0 )
        {
            $id = $userIdfilter[0]->id;
        
            $usersChat = UserSupportChat::where('userId','=', $id)->get();
            $userNameSend = User::find($id);
            $usersChatAll = UserSupportChat::where('sender','=','u')->latest()->get();
    
            return view('adminSupport',compact('usersChatAll','userNameSend','usersChat'));
           
        }else{

            return redirect()->route('allSupportMsg');
            
        }

       

    }
}
