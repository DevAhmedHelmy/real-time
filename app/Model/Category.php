<?php

namespace App\Model;

 

class Category extends Model
{
    public function questions()
    {
        return $this->hasMany('App\Model\Question');
    }
}
