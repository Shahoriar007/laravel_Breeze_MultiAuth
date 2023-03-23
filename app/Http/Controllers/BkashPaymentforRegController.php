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
        $phnNumber = "01770618576";

        $userName = "sandboxTokenizedUser02";
        $password = "sandboxTokenizedUser02@12345";
        $app_key = "4f6o0cjiki2rfm34kfdadl1eqq";
        $app_secret = "2is7hdktrekvrbljjh44ll3d9l1dtjo4pasmjvs5vl5qr3fug4b";

    $responseToken = Http::withHeaders([

        'Content-Type' => 'application/json',
        'Accept' => 'application/json',
        'username' => $userName,
        'password' => $password,


    ])->post('https://tokenized.sandbox.bka.sh/v1.2.0-beta/tokenized/checkout/token/grant', [

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

        ])->post('https://tokenized.sandbox.bka.sh/v1.2.0-beta/tokenized/checkout/create', [

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
                'x-app-key' => '4f6o0cjiki2rfm34kfdadl1eqq',
        
            ])->post('https://tokenized.sandbox.bka.sh/v1.2.0-beta/tokenized/checkout/execute', [
        
                'paymentID' => $paymentId,
        
            ]);
        
            $data = $response->json();

            
        
            return $data;
        
    }
}
