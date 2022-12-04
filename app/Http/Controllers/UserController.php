<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Account;

class UserController extends Controller
{

    public function usersView(){

        $users = User::all();
        return view('users_view',compact('users'));
    }

    
    // User Dashboard
    public function dashboardView(){
        // $sum = Account::sum('paymentAmount');
        // return view('dashboard', compact('sum'));
        return view('dashboard');
    }

    // User Profile Page View
    public function profileView(){

        return view('profilePage');
    }

    


    // Show all users data
    

    // User Status (activate/inactivate) 
    public function UserStatus(Request $request, $status, $id)
    {

        $model = User::find($id);
        $model->status=$status;

        // if null insert admin refCode after activate
        // else insert given refcode 

        if($model->refCode == null && $model->status == "1"){
            $model->refCode ="nca1000";
        }

        if ($model->status == "1"){
            $model->shareableRefcode = "ncu" . "1000" + "$id";
        }

        $model->save();

        // for accounts
        $account = new Account;
        $account->userId = $id;
        $account->paymentAmount = '100';
        $account->save();

        // $request->session()->flash('message','Category Status Updated');
        return redirect('admin/viewusers');
    }
    
}
