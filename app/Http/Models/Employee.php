<?php

namespace TCableBilling\Http\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Employee
 *
 * @package TCableBilling\Http\Models
 */
class Employee extends Model
{
	/**
	 * @var array
	 */
    protected $guarded = [ 'id', 'created_at', 'updated_at'];
}
