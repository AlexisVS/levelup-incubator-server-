<?php

namespace Modules\Incubator\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GoalTask extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'status'];

    public function goals () {
        return $this->belongsToMany(Goal::class, 'pivot_goal_tasks')->using(PivotGoalTask::class);
    }
}
