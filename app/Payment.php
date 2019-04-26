<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','card_number', 'valid_thru', 'card_type', 'name', 'is_primary', 'is_delete'
    ];



    /**
     * Get the user that .
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
       // 'password', 'remember_token',
    ];
}
