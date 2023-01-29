<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserPaymentHistoryController extends Controller
{
    // Admin send msg
    public function paymentHistoryView( $id ){

        return view('userPaymentHistory');
    }

}
