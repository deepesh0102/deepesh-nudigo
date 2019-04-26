<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Itinerary extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','username', 'itinerary_reference', 'journey_date', 'total_fare', 'total_tax', 'total_price','is_delete'
    ];



    /**
     * Get the user that .
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }



    /**
     * Get the itinerary Items for the itinerary.
     */
    public function itineraryItem()
    {
        return $this->hasMany('App\ItineraryItem');
    }



}
