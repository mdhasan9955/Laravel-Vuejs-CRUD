<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\AdminPasswordResetNotification;
use App\Support\Dataviewer;

class Admin extends Authenticatable
{
    use Notifiable;
    use Dataviewer;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'admins'; 
    public static $columns = ['name','email','phone_no','type','status','action'];
    public static $theads = ['Name','Email','Phone number','Type','Status','Action'];
    protected $fillable = [
        'name', 'phone_no', 'email', 'password', 'avatar', 'type','status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
      $this->notify(new AdminPasswordResetNotification($token));
    }
}
