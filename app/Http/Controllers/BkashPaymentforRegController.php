<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BkashPaymentforRegController extends Controller
{
    public function getTokenReg(Request $request){

        $price = $request->price;
        $invoice = $request->invoice;
        $callBackURL = $request->callBackURL;
        $phnNumber = "null";

        $userName = "01712322027";
        $password = "kOkFhfv&}&3";
        $app_key = "v1dGD2IMPAvKbZ26QVYfSygCtc";
        $app_secret = "QrIPQoYSoYaY1LbiqhXi6hKj1TdTc8Xpn4EfO1aDJRvlqgiSp0zT";

    $responseToken = Http::withHeaders([

        'Content-Type' => 'application/json',
        'Accept' => 'application/json',
        'username' => $userName,
        'password' => $password,


    ])->post('https://tokenized.pay.bka.sh/v1.2.0-beta/tokenized/checkout/token/grant', [

        'app_key' => $app_key,
        'app_secret' => $app_secret,

    ]);

    $data = $responseToken->json();

    $newIdToken =  $data['id_token'];

    $id_token = $newIdToken;

    // Call create payment mathod  
    $paymentData = $this->createPaymentReg($id_token, $app_key, $price, $invoice, $callBackURL, $phnNumber);

    // return $paymentData;

    return [
        'value1' => $paymentData,
        'value2' => $id_token,
    ];

    }

    

    // Create Payment
    public function createPaymentReg($id_token, $app_key, $price, $invoice, $callBackURL, $phnNumber){

        $responsePayment = Http::withHeaders([

            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'authorization' => $id_token,
            'x-app-key' => $app_key,

        ])->post('https://tokenized.pay.bka.sh/v1.2.0-beta/tokenized/checkout/create', [

            'mode' => '0011',
            'payerReference' => $phnNumber,
            'callbackURL' => $callBackURL,
            'merchantAssociationInfo' => 'MI05MID54RF09123456One',
            'amount' => $price,
            'currency' => 'BDT',
            'intent' => 'sale',
            'merchantInvoiceNumber' => $invoice,

        ]);

        $paymentData = $responsePayment->json();

        return $paymentData;

        }

        public function executePaymentReg(Request $request){

            

            $paymentId = $request->paymentID;
            $id_token = $request->token_id;

            //dd($paymentId, $id_token);



            $response = Http::withHeaders([
        
                'Accept' => 'application/json',
                'authorization' => $id_token,
                'x-app-key' => 'v1dGD2IMPAvKbZ26QVYfSygCtc',
        
            ])->post('https://tokenized.pay.bka.sh/v1.2.0-beta/tokenized/checkout/execute', [
        
                'paymentID' => $paymentId,
        
            ]);
        
            $data = $response->json();

            
        
            return $data;
        
    }
}
