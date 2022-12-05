<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],

            'phone' => ['required','unique:'.User::class],
            'photo' => ['file', 'mimes:jpg,png,gif'],
        ]);

        $path = null;
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->storePublicly('photos');
        }


        // if null insert admin refCode
        // else insert given refcode

        // if($request->refCode == null){
        //     $givenRefcode = "NCadmin1000";
        // }
        // else{
        //     $givenRefcode = $request->refCode;
        // }

        // generate randdom ref code
        // $generatedRefcode = Str::random(8);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),

            // personal info
            'phone' => $request->phone,
            'nid' => $request->nid,
            'gender' => $request->gender,
            'birthDate' => $request->birthDate,
            'bloodGroup' => $request->bloodGroup,
            'photo' => $path,
            

            // Vehicle Info
            'city' => $request->city,
            'vehicle' => $request->vehicle,
            'drivingLicense' => $request->drivingLicense,

            'cityName' => $request->cityName,
            'category' => $request->category,
            'number' => $request->number,

            'transactionId' => $request->transactionId,

            'refCode' => $request->refCode,
            //'shareableRefcode' => $request->shareableRefcode,
        
        ]);


        event(new Registered($user));

        Auth::login($user);

        return view('inputTransactionid');
    }

    public function transactionid(Request $request){

        $id = $request->id;

        User::findOrFail($id)->update([
            'transactionId' => $request->transactionId,
        ]);

        //return redirect(RouteServiceProvider::HOME);
        return view('dashboard');
    }

    

        // User Information Edit View
        public function userEdit($id ){
        
            $usersProfile = User::findOrFail($id);
            return view('userProfileEdit',compact('usersProfile'));
        }
    
        // User Information Edit Form
        public function userUpdate(Request $request ){
    
            $path = null;
            if ($request->file('photo')) {
                $path = $request->file('photo')->storePublicly('photos');
            }
    
            $id = $request->id;
    
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
    
                
            ]);
    
           
    
            return redirect()->route('dashboard');
        }
}
