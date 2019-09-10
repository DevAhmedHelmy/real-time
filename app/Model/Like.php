<?php

namespace App\Model;

 

class Like extends Model
{
    public function reply()
    {
        return $this->belongsTo('App\Model\Reply');
    }
}
