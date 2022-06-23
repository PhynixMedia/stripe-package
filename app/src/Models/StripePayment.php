<?php
namespace ShoppingOS\Pay\Models;

use \Illuminate\Database\Eloquent\Model;

class StripePayment extends Model
{

    protected $fillable = [
        'order_id',
        'total'
    ];
}
