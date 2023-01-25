<?php

namespace App\Http\Controllers;

use App\Models\GenenralCaseMsg;
use App\Models\User;

use Illuminate\Http\Request;

class GenenralCaseMsgController extends Controller
{
    // User General Case Section View
    public function userGeneralCaseView( $id ){

        $usersChat = GenenralCaseMsg::where('userId','=', $id)->get();

        return view('user_generalCase', compact('usersChat'));

    }

    // User msg send
    public function userGeneralCasePost(Request $request, $id ){

        GenenralCaseMsg::create([
            'userId' => $id,
            'generalCaseMsgText' => $request->generalCaseMsgText,
         ]);

        return redirect()->route('generalCase',$id);

    }

    // Admin all msg view
    public function generalCaseChatView(){

        $usersChatAll = GenenralCaseMsg::where('sender','=','u')->latest()->get();

         return view('adminGeneralCaseNoid',compact('usersChatAll'));

    }

    // Admin all msg view with chat get
    public function adminGeneralCaseViewMsg($id){

        $usersChat = GenenralCaseMsg::where('userId','=', $id)->get();

        $userNameSend = User::find($id);

        $usersChatAll = GenenralCaseMsg::where('sender','=','u')->latest()->get();

         return view('adminGeneralCase',compact('usersChatAll','userNameSend','usersChat'));

    }

    // Admin send msg
    public function adminGeneralCasePost(Request $request, $id ){

        GenenralCaseMsg::create([
            'userId' => $id,
            'generalCaseMsgText' => $request->generalCaseMsgText,
            'sender' => "a",
         ]);

        return redirect()->route('adminGeneralCaseMsg',$id);

    }

    // Admin all msg view with chat get
    public function adminGeneralCasePostSrc(Request $request){

        $userIdfilter = User::where('name','=', $request->name)->orwhere('phone','=', $request->name)->get();

        if( count($userIdfilter) > 0 )
        {
            $id = $userIdfilter[0]->id;
        
            $usersChat = GenenralCaseMsg::where('userId','=', $id)->get();
            $userNameSend = User::find($id);
            $usersChatAll = GenenralCaseMsg::where('sender','=','u')->latest()->get();
    
            return view('adminGeneralCase',compact('usersChatAll','userNameSend','usersChat'));
           
        }else{

            return redirect()->route('allGeneralCaseMsg');
            
        }

       

    }
}
