<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role_user extends Model
{
    use HasFactory;

    public function testrole()
    {
        return $this->belongsTo('App\Models\Role', 'role_id', 'id', 'name');
    }
}
