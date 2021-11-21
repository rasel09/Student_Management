<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'phone_number', 'regs_id', 'roll', 'class_id', 'department_id',
        'image', 'father_name', 'mother_name', 'Address',
    ];
    public function depart()
    {
        return $this->hasOne(Department::class, 'id', 'department_id');
    }
    public function classes()
    {
        return $this->hasOne(StudentClass::class, 'id', 'class_id');
    }
}