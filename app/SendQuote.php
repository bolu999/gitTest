<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SendQuote extends Model
{
    //
    protected $table = 'sendquotes';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'productsNeeded',
        'needs_design',
        'deliveryAddress'
    ];

}
