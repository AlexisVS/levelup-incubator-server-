<?php

namespace Modules\Incubator\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GoalTaskTemplate extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'status'];
    
    // protected static function newFactory()
    // {
    //     return \Modules\Incubator\Database\factories\TaskTemplateModelFactory::new();
    // }

    public function goalTemplates () {
        return $this->belongsToMany(GoalTemplate::class, 'pivot_goal_task_templates')->using(PivotGoalTaskTemplate::class);
    }
}
