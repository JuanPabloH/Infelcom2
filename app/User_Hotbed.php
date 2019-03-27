<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Hotbed extends Model
{
    public function Hotbed(){
    	return $this->belongsTo('App\Hotbed');
    }
    public function user(){
    	return $this->belongsTo('App\User');
    }
}
