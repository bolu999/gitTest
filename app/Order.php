<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    public function order_parent() {
        return $this->belongsTo('App\OrderParent')->withDefault();
    }
}
