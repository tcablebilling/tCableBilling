<?php

namespace TCableBilling\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $guarded = [ 'id', 'created_at', 'updated_at'];
}
