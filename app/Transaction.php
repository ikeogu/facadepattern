<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function plan(){
        return $this->belongsTo('App\Plan');
    }
}
