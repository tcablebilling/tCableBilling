<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
    	'client_id',
    	'date',
    	'billing_id',
    	'paid_amount'
    ];
    /**
     * Get the client channel package.
     */
    public function clientDetails()
    {
        return $this->belongsTo('App\Client', 'client_id');
    }
}
