<?php

namespace Modules\Incubator\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Goal extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'startup_id',
        'helper_user_id',
    ];

    // protected static function newFactory()
    // {
    //     return \Modules\Incubator\Database\factories\GoalModelFactory::new();
    // }
    public function goalTasks()
    {
        return $this->belongsToMany(GoalTask::class, 'pivot_goal_tasks')->using(PivotGoalTask::class);
    }
}
