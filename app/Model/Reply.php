<?php

namespace App\Model;

 

class Reply extends Model
{

    protected static function boot()
    {
        parent::boot();
        static::creating(function($reply){
            $reply->user_id = auth()->user()->id;
        });
    }
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
