<?php


namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\PasswordResetNotification;
use App\Support\Dataviewer;

class User extends Authenticatable
{
    use Notifiable; 
    use Dataviewer;
     
    public static $columns = ['id','company_name','email','phone_no','mobile_no','contact_no','expiry_date','product_used','name','designation','address','status','action'];
    public static $theads = ['Serial','Company Name','Email','Contact number','Expiry date','Product used','Name','Designation','Address','Status','Action'];
    protected $fillable = [
        'name', 'email', 'password','phone',
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
      $this->notify(new PasswordResetNotification($token));
    }
}

