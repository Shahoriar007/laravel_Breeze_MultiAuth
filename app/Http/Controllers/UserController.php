<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Account;
use Illuminate\Support\Facades\Input;
use Barryvdh\DomPDF\Facade\Pdf;


class UserController extends Controller
{

    // all users view classes
    public function usersView(){

        // $start_time = microtime(as_float:true);

        $users = User::all();

        // $end_time = microtime(as_float:true);

        // dd($end_time - $start_time);
        //$users = User::where('designation',Input::get('designation'))->get();
        return view('users_view',compact('users'));
    }

    // all users view short table
    public function usersViewShort(){

        $users = User::latest()->get();
        //$users = User::where('designation',Input::get('designation'))->get();
        return view('users_view_shortTable',compact('users'));
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

        $notification = array(
            'message' => 'User profile succesfully updated!',
            'alert-type' => 'success'
        );

        return redirect()->route('showUsers')->with($notification);
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

    // Generate User Prolfile PDF
    public function generateUserPdf($id){

        $userDetails = User::find($id);

        //dd($userDetails);

        $data = array(
            "id"=>$userDetails->id,
            "name"=>$userDetails->name,
            "email"=>$userDetails->email,
            "phone"=>$userDetails->phone,
            "nid"=>$userDetails->nid,
            "gender"=>$userDetails->gender,
            "birthDate"=>$userDetails->birthDate,
            "bloodGroup"=>$userDetails->bloodGroup,
            "city"=>$userDetails->city,
            "vehicle"=>$userDetails->vehicle,
            "drivingLicense"=>$userDetails->drivingLicense,
            "cityName"=>$userDetails->cityName,
            "category"=>$userDetails->category,
            "number"=>$userDetails->number,
            
            "refCode"=>$userDetails->refCode,
            "shareableRefcode"=>$userDetails->shareableRefcode,
            "designation"=>$userDetails->designation,
            

        );

        $pdf = Pdf::loadView('downloadUserProfile', compact('data'));
        return $pdf->download();

    }


    // User status view
    public function userStatusView($id){

        $userStatus = User::find($id);

        return view('userStatus', compact('userStatus'));

    }


    
}
