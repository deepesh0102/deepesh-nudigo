<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','name','gender', 'surname', 'citizenship', 'passport', 'date_of_birth', 'expiry_date', 'passport_picture',
        'identity_picture'
    ];
}
