<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = [
        'name',
        'email',
        'address',
        'location',
        'phone',
    ];

    public function location() {
        return $this->belongsTo('App\Location');
    }
}
