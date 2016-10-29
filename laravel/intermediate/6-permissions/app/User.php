<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function permissions ()
    {
        return $this->belongsToMany('App\Permission');
    }
    
    public function hasPermission ($code) {
        return \DB::table('permissions_users')
            ->where('user_id', $this->id)
            ->whereRaw('permission_id IN (SELECT id FROM permissions WHERE code = ?)', $code)
            ->exists();
    }
}
