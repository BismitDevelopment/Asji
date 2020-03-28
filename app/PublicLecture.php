<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublicLecture extends Model
{
    //
    protected $fillable = ['title', 'lecture_date', 'description', 'location'];

    /**
     * Get the PublicLecture's Image
     */
    public function images(){

        return $this->morphMany('App\Image', 'imageable');
    }
}
