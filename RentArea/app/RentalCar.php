<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RentalCar extends Model
{
    protected $fillable = [
        'user_id',
        'car_id',
        'branch_pickup',
        'branch_return',
        'pickupDate',
        'returnDate',
        'pickupTime',
        'returnTime',
        'extras',
        'price',
        'status',
        'flight_number',
        'reservation_info',
        'additional_info'
    ];
    public function user() {
        return $this->belongsTo('App\User');
    }
    public function car() {
        return $this->belongsTo('App\Car');
    }
    public function pickupConfiguration() {
        return $this->belongsTo('App\Branch','branch_pickup');
    }
    public function returnConfiguration() {
        return $this->belongsTo('App\Branch','branch_return');
    }
}
