<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaticImage extends Model
{
    protected $fillable = [
        'imageName',
        'link',
        'imageLink'
    ];
    
}
