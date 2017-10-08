<?php

namespace TCableBilling\Http\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Area
 *
 * @package TCableBilling\Http\Models
 */
class Area extends Model
{
    protected $fillable = [
    	'name',
    	'code'
    ];
}
