<?php
use Illuminate\Support\Facades\DB;
namespace App\Http\Controllers;
use Auth;
use App\Transaction;
use App\Plan;
use App\Facades\PaymentPlan;
use Illuminate\Http\Request;

class Plans extends Controller
{
    public function plans()
    {
        Auth::user();
        
        $planFacade =new PaymentPlan;
        $allPlans = $planFacade->all();
        return view('plan',['allPlans'=>$allPlans]);
       
    }

    public function plan($key)
    {
        $planFacade = new PaymentPlan;
        $thePlan = $planFacade->plan($key);
        dd($thePlan);
    }

    public function userplan($key){
        $userPlan = new PaymentPlan;
        $choosedPlan = $planFacade->plan($key);
        dd($choosedPlan);

    }
    public  function all(){
        $plans = \DB::table('payment_plans')->get();
       return ($plans);			
   }
    
   public function changeCurr($id)
    {
        $plans= Transaction::find($id);
        
        $mainplan= new Plan();
        $plans= $mainplan->find($plans->id);
        
        
        // show the edit form and pass the nerd
        return view('transaction.currency')
            ->with('plans', $plans);
    }
    public function update(Request $request,$id)
    {
        $plans = Transaction::find($id);
        $mainplan= new Plan();
        $plans= $mainplan->find($plans->id);
        $plans->currency  = '#';
        
       
        $plans->save();

        // redirect
        return redirect(route('myPlan'))->with('message', 'Successfully updated ');
            
        
    }

    public function planUpgrade(){
        $mainplan= new PaymentPlan();
        $plans= $mainplan->upgrade(); 
        return 'Upgrade was Successful';
    }
}
