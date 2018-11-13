<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function meal()
    {
        return $this->belongsTo('App\Meal');
    }

    public function bookingDetails()
    {
        return $this->hasMany('App\BookingDetail');
    }
}
