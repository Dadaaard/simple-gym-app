<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScheduledClass extends Model
{
    //

    protected $fillable = ['instructor_id', 'class_type_id', 'date_time'];

    public function classType()
    {
        return $this->belongsTo(ClassType::class);
    }

    public function instructor()
    {
        return $this->belongsTo(User::class);
    }
}
