<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserDay extends Model
{
    use SoftDeletes;

    public function calendarDay()
    {
        return $this->belongsTo('App\CalendarDay', 'cdate', 'cdate');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'cdate',        
    ];

}
