<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    protected $fillable = [
    	'client_id',
    	'bill_amount',
    	'month'
    ];
}
