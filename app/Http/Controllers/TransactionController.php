<?php

namespace App\Http\Controllers;
use Auth;
use App\Transaction;
use App\User;

use Illuminate\Http\Request;
use App\Plan;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        
        $userPlan = new Transaction();
        $userPlan->name = $request->name;
        $userPlan->user_id =auth()->user()->id;
        $user = User::find($userPlan->user_id);
        $userPlan->plan_id= $request->id; 
        // $plan= new Plan();
        //  $plan_id= $plan->find($userPlan->payment_plan_id);
        //  $plan_id->planTrans()->save($userPlan);
        $user->trans()->save($userPlan);

        return redirect(route('myPlan'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function myPlan()
    {
        
        $user_id = auth()->user()->id;
        $user = User::findOrFail($user_id);
        
        return view('myplane')->with('user', $user->trans);
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plans= Transaction::find($id);
       
        // show the edit form and pass the nerd
        return view('transaction.edit')
            ->with('plans', $plans);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function update(Request $request,$id)
    {
        
        
            $plans = Transaction::find($id);
            $plans->name  = $request->name;
            
            $plans->save();

            // redirect
            return redirect(route('myPlan'));
            
            
        
    }
}
