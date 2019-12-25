<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id','photo_id','is_active','address','city','phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin(){
        if($this->role != NULL) {
            if ($this->role->name == "administrator" && $this->is_active == 1) {
                return true;
            }
        }
        return false;
    }

    public function isAuthor(){
        if($this->role != NULL) {
            if ($this->role->name == "administrator" || $this->role->name == "author" && $this->is_active == 1) {
                return true;
            }
        }
        return false;
    }

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function photo(){
        return $this->belongsTo('App\Photo');
    }

    public function posts() {
        return $this->hasMany('App\Post');
    }

    public function rentalcars() {
        return $this->hasMany('App\RentalCar');
    }

    public function rentalbikes() {
        return $this->hasMany('App\RentalBikes');
    }

    public function rentalmotos() {
        return $this->hasMany('App\RentalMoto');
    }

    //Laravel mutator to create attributes that don't exist in your model
    public function getGravatarAttribute(){
        //in caz ca emailul nu exista.. va transmite o poza(mistery man) ; size
        $hash = md5(strtolower(trim($this->attributes['email']))) . "?d=mm&s=";
        return "http://www.gravatar.com/avatar/$hash";
    }

}
