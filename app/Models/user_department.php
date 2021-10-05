<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_department extends Model
{
    use HasFactory;
    protected $table = 'user_departments';
    public function department_name()
    {
        return $this->belongsTo(department::class,'department_id','id');
    }
}
