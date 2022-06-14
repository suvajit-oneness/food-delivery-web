<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// use App\Models;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "customers";

    /**
     * Get all of the addresses for the Customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function addresses(): HasMany
    {
        return $this->hasMany(CustomerAddress::class);
    }

    /**
     * Get all of the logged_devices for the Customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function logged_devices(): HasMany
    {
        return $this->hasMany(CustomerLoggedDevice::class, 'customer_id', 'id');
    }
}
