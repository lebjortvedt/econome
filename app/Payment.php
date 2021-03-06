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

    public function calendarDay()
    {
        return $this->belongsTo('App\CalendarDay');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'payment_category_id', 'cdate', 'vendor_id', 'amount', 'subscription', 'salary_period_id', 'user_id'

    ];
}
