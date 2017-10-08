<?php

namespace TCableBilling\Http\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Billing
 *
 * @package TCableBilling\Http\Models
 */
class Billing extends Model
{
	
	/**
	 * @var array
	 */
    protected $fillable = [
    	'client_id',
    	'bill_amount',
    	'month'
    ];
    
	/**
	 * Get the client channel package.
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
    public function clientDetails()
    {
        return $this->belongsTo(
        	'TCableBilling\Http\Models\Client',
	        'client_id'
        );
    }

	/**
	 * Get the client channel package.
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
    public function clientPayments()
    {
        return $this->hasMany(
        	'TCableBilling\Http\Models\Payment',
	        'billing_id',
	        'id'
        );
    }

	/**
	 * Get the client channel package.
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
    public function paidCumulative()
    {
        return $this->hasMany(
        	'TCableBilling\Http\Models\Payment',
	        'client_id',
	        'client_id'
        );
    }

	/**
	 * Get the client channel package.
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
    public function billCumulative()
    {
        return $this->hasMany(
        	'TCableBilling\Http\Models\Billing',
	        'client_id', 'client_id'
        );
    }
	
	/**
	 * @return mixed
	 */
    public function getBillCumulativeSum(){
        $billingId = $this->id;
        return $this->billCumulative
	        ->filter(function ($item) use ($billingId) {
	        	return $item->id <= $billingId;
	        } )->sum('bill_amount');
    }
	
	/**
	 * @return mixed
	 */
    public function getPaidCumulativeSum(){
        $billingId = $this->id;
        return $this->paidCumulative
	        ->filter(function ($item) use ($billingId) {
	        	return $item->billing_id <= $billingId;
	        } )->sum('paid_amount');
    }
}
