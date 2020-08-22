<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentCategory extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name' ];
}