<?php

namespace Modules\Incubator\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Goal extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    // protected static function newFactory()
    // {
    //     return \Modules\Incubator\Database\factories\GoalModelFactory::new();
    // }
    public function goalTasks () {
        return $this->belongsToMany(Task::class)->using(PivotGoalTask::class);
    }
}
