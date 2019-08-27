<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected  $fillable = ['name','permissions'];


    public function user()
    {
    	return $this->belongsToMany('App\User','role_users');
    }

    public function hasAccess()
    {
    	return $this->hasPermission();	
    }

    public function hasPermission()
    {

    	$permissions  = json_decode($this->permissions,true);
    	return $permissions;
    }
}

