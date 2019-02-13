<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    public function Schools(){
    	return $this->hasMany('App\School');
    }
}
