<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    public function Faculties(){
    	return $this->belongsTo('App\School');
    }
}
