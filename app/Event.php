<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $fillable = [
            'event_date', 'event_name', 'event_location', 'event_description',
    ];

    /**
     * Get the Event's Images
     */
    public function images(){
        return $this->morphMany('App\Image', 'imageable');
    }
    
}
