<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_position extends Model
{
  use HasFactory;
  protected $table = 'user_positions';

    public function position_name()
    {
        return $this->belongsTo(position::class,'position_id','id');
    }

}
