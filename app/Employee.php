<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employee extends Model
{
    public function schedule(): HasMany
    {
        return $this->hasMany(EmployeeSchedule::class, 'employee_id');
    }
}
