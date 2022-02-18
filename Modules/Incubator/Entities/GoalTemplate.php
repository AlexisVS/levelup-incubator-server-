<?php

namespace Modules\Incubator\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GoalTemplate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    // protected static function newFactory()
    // {
    //     return \Modules\Incubator\Database\factories\GoalTemplateModelFactory::new();
    // }

    public function goalTaskTemplates()
    {
        return $this->belongsToMany(GoalTaskTemplate::class, 'pivot_goal_task_templates')->using(PivotGoalTaskTemplate::class);
    }
}
