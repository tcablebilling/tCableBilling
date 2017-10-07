<?php

namespace TCableBilling;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
    	'name',
    	'fee'
    ];
}
