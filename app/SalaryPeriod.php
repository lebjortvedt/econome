<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalaryPeriod extends Model
{
    use SoftDeletes;

    public function payments()
    {
        return $this->hasMany('App\Payment');
    }

    protected $fillable = [
        'start_date',
        'end_date' ];
}
