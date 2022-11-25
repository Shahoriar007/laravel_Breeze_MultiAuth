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
        $model->save();
        // $request->session()->flash('message','Category Status Updated');
        return redirect('admin/view');
    }
}
