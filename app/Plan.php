<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    public function planTrans(){
        return $this->hasOne('App\Transaction');
    }
}
