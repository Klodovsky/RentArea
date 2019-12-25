<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RentalMoto extends Model
{
    protected $fillable = [
        'user_id',
        'moto_id',
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
    public function moto() {
        return $this->belongsTo('App\Moto');
    }
    public function pickupConfiguration() {
        return $this->belongsTo('App\Branch','branch_pickup');
    }
    public function returnConfiguration() {
        return $this->belongsTo('App\Branch','branch_return');
    }
}
