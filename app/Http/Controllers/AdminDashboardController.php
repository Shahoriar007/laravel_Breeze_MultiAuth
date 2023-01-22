<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Casefine;
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

        return view('admin.dashboard',compact('allUsers','completedCase','pendingCase','cancelCase','employeeCase','totalCNG','totalCar','totalBike','totalTruck','totalBus','totalReq'));
    }
}
