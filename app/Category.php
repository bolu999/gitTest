<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $with = [
        'department'
    ];
    public function products () {
        return $this->hasMany('App\Product','category_id');
    }
    public function department() {
        return $this->belongsTo('App\Department')->withDefault();
    }
}
