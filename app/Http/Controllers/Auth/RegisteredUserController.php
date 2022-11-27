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

        if($request->refCode == null){
            $givenRefcode = "admin007";
        }
        else{
            $givenRefcode = $request->refCode;
        }

        // generate randdom ref code
        $generatedRefcode = Str::random(7);


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

            'refCode' => $givenRefcode,
            'shareableRefcode' => $generatedRefcode,
        
        ]);


        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
