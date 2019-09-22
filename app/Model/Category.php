<?php

namespace App\Model;

use App\User;
use Illuminate\Support\Str;
class Category extends Model
{
    protected static function boot()
    {
        parent::boot();
        static::creating(function($category){
            $category->slug = Str::slug($category->name);
        });
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function questions()
    {
        return $this->hasMany('App\Model\Question');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getPathAttribute()
    {
        return 'api/categories/'.$this->slug;
    }
}
