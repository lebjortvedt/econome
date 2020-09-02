<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDay extends Model
{
    use SoftDeletes;

    public function calendarDay()
    {
        return $this->belongsTo('App\CalendarDay');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'cdate',
        'cday_id'
    ];

}
