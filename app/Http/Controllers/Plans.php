<?php
use Illuminate\Support\Facades\DB;
namespace App\Http\Controllers;
use Auth;
use App\Transaction;
use App\Facades\PaymentPlan;
use Illuminate\Http\Request;

class Plans extends Controller
{
    public function plans()
    {
        Auth::user();
        
        $planFacade = Plans::all();
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
        $mainplan= new PaymentPlan();
        $plans_id= $mainplan->find($plans);
        
        // show the edit form and pass the nerd
        return view('transaction.currency')
            ->with('plans_id', $plans_id);
    }
    public function updateCurr(Request $request,$id)
    {
        
        
            $plans = Transaction::find($id);
            $mainplan= new PaymentPlan();
            $plan_id= $mainplan->find($plans);
            $plans_id->currency  = $request->currency;
            
            $plans->save();

            // redirect
            return redirect(route('myPlan'))->with('message', 'Successfully updated ');
            
        
    }
}
