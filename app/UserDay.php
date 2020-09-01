<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDay extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id'

    ];

}
