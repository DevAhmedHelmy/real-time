<?php

namespace App\Model;

use Illuminate\Support\Str;

class Question extends Model
{
    protected $fillable = ['title','body','slug','user_id','category_id'];
    // to created slug
    protected static function boot()
    {
        parent::boot();
        static::creating(function($question){
            $question->slug = Str::slug($question->title);
        });
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
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
      return "/questions/$this->slug";
    }

}
