<?php

namespace App\Model;



class Question extends Model
{
    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function replies()
    {
        return $this->hasMany('App\Model\Reply');
    }

    public function category()
    {
        return $this->belongsTo('App\Model\Category');
    }

    public function getPathAttribute()
    {
      return asset("api/questions/$this->slug");
    }

}
