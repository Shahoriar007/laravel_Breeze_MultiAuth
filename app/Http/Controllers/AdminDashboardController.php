<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Admin;
use App\Models\Casefine;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{

    // Admin Dashboard Page
    public function adminDashboard()
    {
        // All Users
        $allUsers = User::where('status','=','1')->count();

        // Completed Case
        $completedCase = Casefine::where('caseStatus','=','done')->count();
        // Pending Case
        $pendingCase = Casefine::where('caseStatus','=','pending')->count();
        // Cancelled Case
        $cancelCase = Casefine::where('caseStatus','=','cancel')->count();

        //  Total Employee List
        $employeeCase = User::where('designation','=','Employee')->count();

        //  Total CNG Member
        $totalCNG = User::where('vehicle','=','CNG')->count();

        //  Total Car Member
        $totalCar = User::where('vehicle','=','Car')->count();

        //  Total Bike Member
        $totalBike = User::where('vehicle','=','Bike')->count();

        //  Total Truck Member
        $totalTruck = User::where('vehicle','=','Truck')->count();

        //  Total Bus Member
        $totalBus = User::where('vehicle','=','Bus')->count();

        // Total Request
        $totalReq = User::count();

        $generalUser = User::where('designation','=','General User')->count();

        return view('admin.dashboard',compact('allUsers','completedCase','pendingCase','cancelCase','employeeCase','totalCNG','totalCar','totalBike','totalTruck','totalBus','totalReq','generalUser'));
    }

    // Admin Employee Table
    public function employeeListTable()
    {
        $adminEmployeeList = User::where('designation','=','Employee')->get();

        return view('adminEmployeeList',compact('adminEmployeeList'));
    }

    // Admin CarChalok Table
    public function carChalokTable()
    {
        $totalCarChalok = User::where('vehicle','=','Car')->get();

        return view('adminTotalCarChalok',compact('totalCarChalok'));
    }

    // Admin BikeChalok Table
    public function bikeChalokTable()
    {
        $totalBikeChalok = User::where('vehicle','=','Bike')->get();

        return view('adminTotalBikeChalok',compact('totalBikeChalok'));
    }

    // Admin CNG Chalok Table
    public function cngChalokTable()
    {
        $totalCngChalok = User::where('vehicle','=','CNG')->get();

        return view('adminTotalCngChalok',compact('totalCngChalok'));
    }

    // Admin Bus Chalok Table
    public function busChalokTable()
    {
        $totalBusChalok = User::where('vehicle','=','Bus')->get();

        return view('adminTotalBusChalok',compact('totalBusChalok'));
    }

    // Admin Truck Chalok Table
    public function truckChalokTable()
    {
        $totalTruckChalok = User::where('vehicle','=','Truck')->get();

        return view('adminTotalTruckChalok',compact('totalTruckChalok'));
    }

    // Admin Pickup Chalok Table
    public function pickupChalokTable()
    {
        $totalPickupChalok = User::where('vehicle','=','Pickup')->get();

        return view('adminTotalPickupChalok',compact('totalPickupChalok'));
    }


    // Admin change pass

     public function adminChangePassword()
     {
         return view('adminChangePasswordView');
     }

     public function adminCheckChangePassword(Request $request)
     {

        $id = Auth::guard('admin')->user()->id;

        $preAdmin = Admin::find($id);

        if(!Hash::check($request->oldPassword, Auth::guard('admin')->user()->password))
        {
            $notification = array(
                'message' => 'Password did not matched',
                'alert-type' => 'success'
            );

            
        }else{
            $preAdmin->password = Hash::make($request->password);
            $preAdmin->save();

            $notification = array(
                'message' => 'Password changed',
                'alert-type' => 'success'
            );

        }

        return redirect()->route('adminChangePass')->with($notification);
     }

     //Users creators position view
    public function viewUsersCreatorsPosition()
    {
        return view('userCreatorsPosition');
    }

    public function viewUsersCreatorsPositionSearch(Request $request)
    {
        $creators = User::where('refCode','=', $request->refCode)->get();

        return view('userCreatorsPosition', compact('creators'));
    }


}
