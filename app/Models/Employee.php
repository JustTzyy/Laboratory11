<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $fillable = ['first_name', 'last_name', 'email', 'phone_number', 'hired_date', 'job_id','salary', 'manager_id', 'department_id'];

    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id', 'job_id');
    }

    public function manager()
    {
        return $this->belongsTo(Employee::class, 'manager_id', 'employee_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'department_id');
    }

    public function employee(){

        return $this->hasMany(Employee::class, 'manager_id', 'employee_id');
    }

    public function dependent()
    {
        return $this->hasMany(Dependent::class, 'employee_id','employee_id');
    }
    
}
