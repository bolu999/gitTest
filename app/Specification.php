<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specification extends Model
{
    //
    protected $fillable = [
        'title',
        'content',
        'product_id',
    ];

    public function product() {
        return $this->belongsTo('App\Product');
    }
}
