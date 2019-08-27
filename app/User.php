<?php

namespace App;
use App\Role;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','thumbnail'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function role(){
        return $this->belongsToMany('App\Role','role_users','user_id','role_id');
    }

    public function isSuperAdmin(){
        return  $this->id == 1;
    }


    public function hasAccess(array $permission)
    {

       $array = array();

        foreach($this->role as $role)
        {
            $permissions = $role->hasAccess();
            foreach($permissions as $key=>$value)
            {
                $array[]  = ($key);
            }
            
        }
            
            $name  = implode($permission);
            if(in_array($name,$array)){
                return true;
            }
            else
            {
                return false;
            }
    }   


    
}
