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
}
