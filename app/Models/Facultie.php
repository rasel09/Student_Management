<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facultie extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone', 'department_id'
    ];
    public function facultie()
    {
        return $this->hasOne(Department::class, 'id', 'department_id');
    }
}