<?php

namespace App\Http\Controllers;

use App\Models\UserDesignation;
use Illuminate\Http\Request;

class UserDesignationController extends Controller
{
    // User Designation input view
    public function usersDesignationAddView(){

        $UserDesignation = UserDesignation::all();

        return view('adminUserDgn',compact('UserDesignation'));

    }

    // User designation form input
    public function usersDesignationAddform(Request $request){

        UserDesignation::create([
            'userDgn' => $request->userDgn,
         ]);

         $notification = array(
            'message' => 'Added successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('adminAddUserDgn')->with($notification);

    }

    // User designation delete
    public function usersDesignationDelete($id){

        UserDesignation::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Deleted successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('adminAddUserDgn')->with($notification);

    }
    
}
