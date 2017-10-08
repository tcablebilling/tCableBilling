<?php

namespace TCableBilling\Http\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Client
 *
 * @package TCableBilling\Http\Models
 */
class Client extends Model
{
	
	/**
	 * @var array
	 */
    protected $fillable = [
    	'area_id',
    	'name',
    	'phone_no_1',
    	'phone_no_2',
    	'address',
    	'connection_type',
    	'package_id',
        'client_status',
    	'address_proof',
    	'address_proof_no',
    	'device_box_no'
    ];
    
	/**
	 * Get the client channel package.
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
    public function package()
    {
        return $this->belongsTo(
        	'TCableBilling\Http\Models\Package',
	        'package_id',
	        'id'
        );
    }
	
	/**
	 * Get the client area.
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
    public function area_name()
    {
        return $this->belongsTo(
        	'TCableBilling\Http\Models\Area',
	        'area_id',
	        'id'
        );
    }
}
