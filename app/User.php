<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'document','name','last_name','cv','photo', 'email', 'password',
    ];

    public function User_Hotbed(){
        return $this->hasMany('App\User_Hotbed');
    }
    public function hotbeds(){
        return $this->belongsToMany('App\Hodbed','user_hotbeds');
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles(){
    return $this
        ->belongsToMany('App\Role')
        ->withTimestamps();
    }

    public function authorizeRoles($roles){
    if ($this->hasAnyRole($roles)) {
        return true;
        }
    abort(401, 'Esta acción no está autorizada.');
    }


    public function hasAnyRole($roles){
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }
    public function hasRole($role){
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }
    public function scopeName($query,$name){
        if (trim($name) != "") {
           $query->where(\DB::raw("CONCAT(name,' ',last_name)"),"LIKE","%$name%"); 
        }    
    }
}
