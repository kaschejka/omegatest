<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class position extends Model
{
  use HasFactory;
  protected $table = 'positions';
    public function user_positions()
    {
                return $this->hasMany(user_position::class);
    }
}
