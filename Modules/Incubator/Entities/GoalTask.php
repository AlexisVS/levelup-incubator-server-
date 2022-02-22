<?php

namespace Modules\Incubator\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GoalTask extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'status'];

    
    // protected static function newFactory()
    // {
    //     return \Modules\Incubator\Database\factories\TaskModelFactory::new();
    // }

    public function goals () {
        return $this->belongsToMany(Goal::class, 'pivot_goal_tasks')->using(PivotGoalTask::class);
    }
}
