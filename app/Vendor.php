<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name' ];
}
