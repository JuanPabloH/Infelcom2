<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResearchCenter extends Model
{
    public function Groups(){
    	return $this->hasMany('App\Group');
    }
}
