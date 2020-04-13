<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    //
    protected $fillable = ['title', 'publish_date', 'writer', 'description'];

    /**
     * Get all of the journal files
     */
    public function documents(){
        
        return $this->hasMany('App\Document');
    }

    public function images(){
        return $this->morphMany('App\Image', 'imageable');
    }
}
