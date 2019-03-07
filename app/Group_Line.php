<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group_Line extends Model
{
    public function Group(){
    	return $this->belongsTo('App\Group');
    }
    public function line(){
    	return $this->belongsTo('App\Line_of_investigations');
    }
}
