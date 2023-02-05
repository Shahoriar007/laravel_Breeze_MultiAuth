<?php

namespace App\Http\Controllers;

use App\Models\TranningBranch;
use Illuminate\Http\Request;

class TranningBranchController extends Controller
{
    
    public function index()
    {
        $teanningBranch = TranningBranch::all();
        return view('adminTranningBranch', compact('teanningBranch'));
    }

    
    public function create(Request $request)
    {
        TranningBranch::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
         ]);
    
        return redirect()->route('tranningBranch');
    }

    
    public function delete($id)
    {
        TranningBranch::findOrFail($id)->delete();

        return redirect()->route('tranningBranch');
    }

    
    public function userView()
    {
        $trainingBranch = TranningBranch::all();
        
        return view('userTraningBranch',compact('trainingBranch'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TranningBranch  $tranningBranch
     * @return \Illuminate\Http\Response
     */
    public function edit(TranningBranch $tranningBranch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TranningBranch  $tranningBranch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TranningBranch $tranningBranch)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TranningBranch  $tranningBranch
     * @return \Illuminate\Http\Response
     */
    public function destroy(TranningBranch $tranningBranch)
    {
        //
    }
}
