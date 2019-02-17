<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResearchCenter extends Model
{
    public function Hotbeds(){
    	return $this->hasMany('App\Hotbed');
    }
}
