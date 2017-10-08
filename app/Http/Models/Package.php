<?php

namespace TCableBilling\Http\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Package
 *
 * @package TCableBilling\Http\Models
 */
class Package extends Model
{
	
	/**
	 * @var array
	 */
    protected $fillable = [
    	'name',
    	'fee'
    ];
}
