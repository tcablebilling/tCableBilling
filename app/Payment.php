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
    public function paymentPaidCumulative()
    {
    	$paymentId = $this->id;
    	$paymentClientId = $this->client_id;
        return $this->where('client_id', '=', $paymentClientId)->where('id', '<=', $paymentId)->sum('paid_amount');
    }
}
