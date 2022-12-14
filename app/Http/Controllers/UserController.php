<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Account;

class UserController extends Controller
{

    // all users view classes
    public function usersView(){

        $users = User::latest()->paginate(10);
        return view('users_view',compact('users'));
    }

   

    // users details view classes
    public function usersDetails( $id ){

        $userDetails = User::find($id);
        return view('users_details', compact('userDetails'));

    }

    // User Information Edit View
    public function adminUserProfileEditView($id ){
        
        $usersInfo = User::findOrFail($id);
        return view('adminUserProfileEdit',compact('usersInfo'));
    }

    // User Information Edit Form
    public function adminUserUpdate(Request $request ){

        $id = $request->id;

        $moreInfo = User::findOrFail($id);

        $path = $moreInfo->photo;
        if ($request->file('photo')) {
            $path = $request->file('photo')->storePublicly('photos');
        }

        User::findOrFail($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            
            'nid' => $request->nid,
            'birthDate' => $request->birthDate,
            'bloodGroup' => $request->bloodGroup,

            'photo' => $path,

            'city' => $request->city,
            'vehicle' => $request->vehicle,
            'drivingLicense' => $request->drivingLicense,
            'cityName' => $request->cityName,
            'category' => $request->category,
            'number' => $request->number,

            'designation' => $request->designation,

            
        ]);

        return redirect()->route('showUsers');
    }

    // delete users
    public function deleteUsers( $id ){

        User::findOrFail($id)->delete();

        $notification = array(
            'message' => 'User Deleted',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
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

        // Notification
        if($status == 0){
            $notification = array(
                'message' => 'User Deactivated!',
                'alert-type' => 'success'
            );
        }
        else{
            $notification = array(
                'message' => 'User Activated!',
                'alert-type' => 'success'
            );
        }

        // if null insert admin refCode after activate
        // else insert given refcode 

        if($model->refCode == null && $model->status == "1"){
            $model->refCode ="01910512921";

        }

        if ($model->status == "1"){
            $model->shareableRefcode = $model->phone;
        }

        $model->save();

        // for accounts
        $account = new Account;
        $account->userId = $id;
        $account->paymentAmount = '100';
        $account->save();

        

        // $request->session()->flash('message','Category Status Updated');
        return redirect('admin/viewusers')->with($notification);
    }


    
}
