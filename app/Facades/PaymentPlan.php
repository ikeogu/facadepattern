<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class PaymentPlan
{
    protected static function getFacadeAccessor() 
    {
         return 'paymentplan'; 
    }

    public function allPlans() 
    {
        $data = [
            [
                'name'=>'free',
                'amount'=>1000,
                'period'=>'1',
                'currency'=>'$',
                'functions'=>[
                   
                ],
            ],
            [
                'name'=>'basic',
                'amount'=>2000,
                'period'=>'3',
                'currency'=>'$',
                'functions'=>[
                   
                ],
            ],
            [
                'name'=>'professional',
                'amount'=>5000,
                'period'=>'6',
                'currency'=>'$',
                'functions'=>[
                    
                ],
            ]
        ];
        return $data;
    }

    public function plan($key){
        $plans = $this->allPlans();
        $plan = $plans[1];
        if(isset($plans[$key])){
            $plan = $plans[$key];
        }
        return $plan;
    }
    public  function all(){
         $plans = \DB::table('payment_plans')->get();
        return ($plans);			
    }
    public function find($id){
        $plan = \DB::table('payment_plans')->where('$id',$id);
        
		return $plan;
    }
    public function planTrans(){
       return $this->hasManyThrough('App\User','App\Transaction');
    }
}