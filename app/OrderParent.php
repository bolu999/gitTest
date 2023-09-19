<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderParent extends Model
{
    //
    protected $with = [
        'orders'
    ];
    public function orders () {
        return $this->hasMany('App\Order','order_parent_id');
    }
}
