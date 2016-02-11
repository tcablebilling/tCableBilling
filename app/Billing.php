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
    /**
     * Get the client channel package.
     */
    public function clientPayments()
    {
        return $this->hasMany('App\Payment', 'billing_id', 'id');
    }
    /**
     * Get the client channel package.
     */
    public function paidCumulative()
    {
        return $this->hasMany('App\Payment', 'client_id', 'client_id');
    }
    /**
     * Get the client channel package.
     */
    public function billCumulative()
    {
        return $this->hasMany('App\Billing', 'client_id', 'client_id');
    }
}
