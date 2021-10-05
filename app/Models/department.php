<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class department extends Model
{
  use HasFactory;
  protected $table = 'departments';
  public function user_departments()
  {
    return $this->hasMany(user_department::class);
  }
}
