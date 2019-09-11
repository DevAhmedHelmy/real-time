<?php

namespace App\Model;

 

class Category extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function questions()
    {
        return $this->hasMany('App\Model\Question');
    }

    public function getPathAttribute()
    {
        return asset('api/categories/'.$this->slug);
    }
}
