<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //
    public function products () {
        return $this->hasMany('App\Category','department_id');
    }
}
