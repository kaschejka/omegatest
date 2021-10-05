<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class company_user extends Model
{
    use HasFactory;
    public function user_positions()
    {
        return $this->hasOne(user_position::class);
    }
    public function user_departments()
    {
        return $this->hasMany(user_department::class);
    }
}
