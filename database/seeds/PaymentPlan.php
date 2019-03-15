<?php

use Illuminate\Database\Seeder;

class Plan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       App\Plan::insert([
        'name'=>'professional',
        'amount'=>5000,
        'period'=>'6',
        'currency'=>'$',
                  
    
       ]);
       App\Plan::insert([
        'name'=>'basic',
        'amount'=>2000,
        'period'=>'3',
        'currency'=>'$',
       ]);
       App\Plan::insert([
          
            'name'=>'free',
            'amount'=>1000,
            'period'=>'1',
            'currency'=>'$',
       ]);   
    
    
   
    }
}
