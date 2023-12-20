<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;

class Employee extends Model
{
    use HasFactory;
    
    protected $table = 'employees';
    protected $fillable = ['name', 'email','phone_number', 'department'];

    public function department() {
        return $this->belongsTo(Department::class);
    }
}
