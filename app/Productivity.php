<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productivity extends Model
{
    public function scopeName($query,$description){
        if (trim($description) != "") {
           $query->where("description","LIKE","%$description%"); 
        }    
    }
}
