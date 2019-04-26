<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItineraryItem extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','itinerary_id','passenger', 'notes', 'cost', 'reference_image', 'team_cost', 'holding_reference',
        'booking_reference','is_delete','team_note_line','journey_date'
    ];


    /**
     * Get the user that .
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the itinerary .
     */
    public function itinerary()
    {
        return $this->belongsTo('App\Itinerary','itinerary_id');
    }

}
