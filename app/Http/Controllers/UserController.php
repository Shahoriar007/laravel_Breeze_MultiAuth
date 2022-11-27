<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){

        $users = User::all();
        return view('users_view',compact('users'));
    }

    public function UserStatus(Request $request, $status, $id)
    {

        $model=User::find($id);
        $model->status=$status;

        // if null insert admin refCode after activate
        // else insert given refcode 

        if($model->refCode == null && $model->status == "1"){
            $model->refCode ="NCadmin1000";
        }

        if ($model->status == "1"){
            $model->shareableRefcode = "NCuser" . "1000" + "$id";
        }



        $model->save();
        // $request->session()->flash('message','Category Status Updated');
        return redirect('admin/view');
    }

    public function dashboardView(){

        

        return view('dashboard');
    }
}
