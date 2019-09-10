<?php

namespace App\Model;

 

class Reply extends Model
{
    public function question()
    {
        return $this->belongsTo('App\Model\Question');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function likes()
    {
        return $this->hasMany('App\Model\Like');
    }
}
