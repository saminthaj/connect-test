<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Schedule extends Model
{
    public function shift(): HasMany
    {
        return $this->hasMany(ShiftSchedule::class, 'shift_id');
    }
}
