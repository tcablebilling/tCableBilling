<?php

namespace TCableBilling\Http\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Payment
 *
 * @package TCableBilling\Http\Models
 */
class Payment extends Model
{
	
	/**
	 * @var array
	 */
	protected $fillable = [
    	'client_id',
    	'date',
    	'billing_id',
    	'paid_amount'
    ];
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function clientDetails()
    {
        return $this->belongsTo('TCableBilling\Http\Models\Client', 'client_id');
    }
	
	/**
	 * @return mixed
	 */
	public function paymentPaidCumulative()
    {
    	$paymentId = $this->id;
    	$paymentClientId = $this->client_id;
        return $this->where('client_id', '=', $paymentClientId)->where('id', '<=', $paymentId)->sum('paid_amount');
    }
}
