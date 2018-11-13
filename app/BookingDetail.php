<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingDetail extends Model
{
    public function meal()
    {
        return $this->belongsTo('App\Meal');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
