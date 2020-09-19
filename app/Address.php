<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'user_id',
        'address',
        'province',
        'district',
        'name',
        'type',
        'country',
        'city',
        'postal_code',
        'phone',
        'set_default',
        'created_at',
        'updated_at'
    ];
}
