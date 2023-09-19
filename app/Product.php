<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $with = [
        'price_list',
        'category',
        'specification',
        'review',
    ];
    public function specification () {
        return $this->hasMany('App\Specification','product_id');
    }
    public function feature () {
        return $this->hasMany('App\Feature','product_id');
    }
    public function category() {
        return $this->belongsTo('App\Category')->withDefault();
    }
    public function price_list() {
        return $this->hasOne('App\Pricelist');
    }
    public function review() {
        return $this->hasMany('App\Review');
    }
    public function files()
    {
      return $this->hasMany(App\Upload::class);
    }

    protected $fillable=[
        'name',
        'description',
        'material',
        'finishing',
        'price',
        'delivery',
        'promotion',
        'category_id',
        'price_id',
        'image_link1'
            ];
}
