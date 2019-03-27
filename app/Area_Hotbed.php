<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area_Hotbed extends Model
{
    public function Hotbed(){
    	return $this->belongsTo('App\Hotbed');
    }
    public function area(){
    	return $this->belongsTo('App\ResearchArea');
    }
}
