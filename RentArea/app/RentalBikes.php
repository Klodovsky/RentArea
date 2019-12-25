<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RentalBikes extends Model
{
    protected $fillable = [
        'user_id',
        'bike_id',
        'branch_pickup',
        'branch_return',
        'pickupDate',
        'returnDate',
        'pickupTime',
        'returnTime',
        'extras',
        'price',
        'status'
    ];
    public function user() {
        return $this->belongsTo('App\User');
    }
    public function bike() {
        return $this->belongsTo('App\Bike');
    }
    public function pickupConfiguration() {
        return $this->belongsTo('App\Branch','branch_pickup');
    }
    public function returnConfiguration() {
        return $this->belongsTo('App\Branch','branch_return');
    }
}
