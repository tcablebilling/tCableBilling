<?php

namespace TCableBilling\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = [
    	'name',
    	'code'
    ];
}
