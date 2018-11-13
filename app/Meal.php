<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    protected $fillable=[
        'image', 'name', 'price', 'qty'
    ];

    public function carts()
    {
        return $this->hasMany('App\Cart');
    }

    public function bookingDetails()
    {
        return $this->hasMany('App\BookingDetail');
    }
}
