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

use Image;

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
            'password' => 'required',
            'password_confirmation' => 'required',
            'photo' => ['file', 'mimes:jpg,png,gif'],
        ],[
            'name.required' => 'Input your name same as your NID',
            'phone.required' => 'Input your active phone number',
        ]);

        $path = null;
        if ($request->hasFile('photo')) {
            //  Image name genarate, resize and save in a folder
            $image = $request->file('photo');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('upload/user_images/'.$name_gen);
            $path = 'upload/user_images/'.$name_gen;
        }

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
            'designation' => "General User",
        
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
    
            $notification = array(
                'message' => 'Registration done succesfully',
                'alert-type' => 'success'
            );
    
            return redirect()->route('dashboard')->with($notification);

    

        
    }


        // User Information Edit View
        public function userEdit($id ){
        
            $usersProfile = User::findOrFail($id);
            return view('userProfileEdit',compact('usersProfile'));
        }
    
        // User Information Edit Form
        public function userUpdate(Request $request ){
    
            $id = $request->id;

            $moreInfo = User::findOrFail($id);

            $path = $moreInfo->photo;
            if ($request->file('photo')) {
                $image = $request->file('photo');
                $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(300,300)->save('upload/user_images/'.$name_gen);
                $path = 'upload/user_images/'.$name_gen;
            }
    
            User::findOrFail($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                
                'nid' => $request->nid,
                'birthDate' => $request->birthDate,
                'bloodGroup' => $request->bloodGroup,
                'gender' => $request->gender,
    
                'photo' => $path,
    
                'city' => $request->city,
                'vehicle' => $request->vehicle,
                'drivingLicense' => $request->drivingLicense,
                'cityName' => $request->cityName,
                'category' => $request->category,
                'number' => $request->number,
 
            ]);

            $notification = array(
                'message' => 'User information update succesfully',
                'alert-type' => 'success'
            );
    
            return redirect()->route('dashboard')->with($notification);
        }

         // admin can add new users (viewPage)
    public function usersAddByAdminView(){

        return view('adminUserProfileAdd');

    }
    // admin can add new users form
    public function usersAddByAdminForm(Request $request){

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'password_confirmation' => ['required'],

            'phone' => ['required','unique:'.User::class],
            'photo' => ['file', 'mimes:jpg,png,gif'],
        ],[
            'name.required' => 'Input your name same as your NID',
            'phone.required' => 'Input your active phone number',
        ]);

        $path = null;
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
                $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(300,300)->save('upload/user_images/'.$name_gen);
                $path = 'upload/user_images/'.$name_gen;
        }

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
            'designation' => "General User",
        
        ]);

        $notification = array(
            'message' => 'User succesfully added!',
            'alert-type' => 'success'
        );

        event(new Registered($user));

        $users = User::latest()->paginate(10);

        return redirect()->route('showUsers')->with($notification);

    }
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

