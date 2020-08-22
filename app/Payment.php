<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'payment_category_id', 'user_day_id', 'vendor_id', 'amount', 'subscription', 'date'

    ];
}
