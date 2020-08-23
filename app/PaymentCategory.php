<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentCategory extends Model
{
    use SoftDeletes;

    public function payments()
    {
        return $this->hasMany('App\Payment');
    }

    protected $fillable = [
        'name' ];
}