<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;

    public function vendor()
    {
        return $this->belongsTo('App\Vendor');
    }

    public function paymentCategory()
    {
        return $this->belongsTo('App\PaymentCategory');
    }

    public function salaryPeriod()
    {
        return $this->belongsTo('App\SalaryPeriod');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'payment_category_id', 'user_day_id', 'vendor_id', 'amount', 'subscription', 'paid_at', 'salary_period_id'

    ];
}
