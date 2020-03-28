<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    //
    protected $fillable = ['path'];

    public function journal(){

        return $this->belongsTo('App\Journal');
    }
}
