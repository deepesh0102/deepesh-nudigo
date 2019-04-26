<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','gender', 'email', 'password', 'username', 'date_of_birth', 'address', 'state',
        'city', 'country', 'zip_code', 'contact_number', 'profile_picture', 'email_verified_at',
        'email_verified_status', 'api_token', 'status', 'is_delete'
    ];



    /**
     * Get the itinerary Items for the itinerary.
     */
    public function itineraryItem()
    {
        return $this->hasMany('App\ItineraryItem');
    }

    /**
     * Get the itinerary for the itinerary.
     */
    public function itinerary()
    {
        return $this->hasMany('App\itinerary');
    }


    /**
     * Get the itinerary for the itinerary.
     */
    public function payment()
    {
        return $this->hasMany('App\Payment');
    }



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
