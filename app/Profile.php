<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $fillable = [
        'first_name', 'last_name', 'profession', 'affiliation',
        'discipline','education', 'membership', 'experience', 'address',
    ];

    

    /**
     * Get the Profile's Image
     */
    public function images(){

        return $this->morphMany('App\Image', 'imageable');
    }

    public function user(){

        return $this->belongsTo('App\User','user_id','id');
    }
}
