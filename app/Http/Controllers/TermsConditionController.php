<?php

namespace App\Http\Controllers;

use App\Models\TermsCondition;
use Illuminate\Http\Request;

class TermsConditionController extends Controller
{
    
    public function userTermsConditionView()
    {
        $termsCondition = TermsCondition::all();

        return view('termsConditionView',compact('termsCondition'));
    }



    // ------------------------Admin Side------------------------------------
    public function index()
    {
        $termsCondition = TermsCondition::all();

        return view('adminTermsCondition',compact('termsCondition'));
    }

    
    public function create(Request $request)
    {
        $data = TermsCondition::where('id','=',1)->get();

        if(empty($data[0]->id) ){

            TermsCondition::create([
                'terms' => $request->terms,
             ]);

        }else{

            $termsCondition = TermsCondition::find(1);

            $termsCondition->terms = $request->terms;
            
            $termsCondition->save();

        }

        
    
        return redirect()->route('termsConditionView');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TermsCondition  $termsCondition
     * @return \Illuminate\Http\Response
     */
    public function show(TermsCondition $termsCondition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TermsCondition  $termsCondition
     * @return \Illuminate\Http\Response
     */
    public function edit(TermsCondition $termsCondition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TermsCondition  $termsCondition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TermsCondition $termsCondition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TermsCondition  $termsCondition
     * @return \Illuminate\Http\Response
     */
    public function destroy(TermsCondition $termsCondition)
    {
        //
    }
}
