<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bike extends Model
{
    protected $fillable = [
        'name',
        'photo_id',

        'type',
        'bike_for',
        'max_weight',
        'wheel_size',
        'frame_size',
        'chain',
        'handlebar_width',

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
