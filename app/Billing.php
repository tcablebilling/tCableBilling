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
    /**
     * Get the client channel package.
     */
    public function clientDetails()
    {
        return $this->belongsTo('App\Client', 'client_id');
    }
}
