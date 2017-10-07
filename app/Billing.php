<?php

namespace TCableBilling;

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
        return $this->belongsTo('TCableBilling\Client', 'client_id');
    }
    /**
     * Get the client channel package.
     */
    public function clientPayments()
    {
        return $this->hasMany('TCableBilling\Payment', 'billing_id', 'id');
    }
    /**
     * Get the client channel package.
     */
    public function paidCumulative()
    {
        return $this->hasMany('TCableBilling\Payment', 'client_id', 'client_id');
    }
    /**
     * Get the client channel package.
     */
    public function billCumulative()
    {
        return $this->hasMany('TCableBilling\Billing', 'client_id', 'client_id');
    }

    public function getBillCumulativeSum(){
        $billingId = $this->id;
        return $this->billCumulative->filter(function ($item) use ($billingId) { return $item->id <= $billingId; })->sum('bill_amount');
    }

    public function getPaidCumulativeSum(){
        $billingId = $this->id;
        return $this->paidCumulative->filter(function ($item) use ($billingId) { return $item->billing_id <= $billingId; })->sum('paid_amount');
    }
}
