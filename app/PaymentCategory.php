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

    public function currentMonthPayments()
    {
        return $this->hasMany('App\Payment')
        ->whereYear('paid_at', '=', date('Y'))
        ->whereMonth('paid_at', '=', date('m'));
    }

    protected $fillable = [
        'name' ];
}