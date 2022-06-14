<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Role_user extends Model
{
    use HasFactory;

    /**
     * Get the user that owns the Role_user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'id', 'role_id');
    }
}
