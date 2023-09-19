<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pricelist extends Model
{
    //
    protected $fillable = [
        'quantity',
        'normalPrice',
        'discountPrice'
    ];

    // protected $with = [
    //     'products'
    // ];
    // public function products () {
    //     return $this->hasMany('App\Product','price_id');
    // }

}
