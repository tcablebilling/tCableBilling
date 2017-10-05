<?php

namespace TCableBilling\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
    	'name',
    	'fee'
    ];
}
