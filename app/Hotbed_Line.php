<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotbed_Line extends Model
{
    public function Hotbed(){
    	return $this->belongsTo('App\Hotbed');
    }
    public function line(){
    	return $this->belongsTo('App\Line_of_investigations');
    }
}
