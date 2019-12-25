<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Moto extends Model
{
    protected $fillable = [
        'name',
        'photo_id',

        'type',
        'max_weight',
        'max_speed',
        'fuel_economy',
        'engine',

        'is_available',
        'price_per_day',
        'branch_id',
    ];

    public function photo() {
        return $this->belongsTo('App\Photo');
    }
    public function branch() {
        return $this->belongsTo('App\Branch');
    }
}
