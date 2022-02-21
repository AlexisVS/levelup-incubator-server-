<?php

namespace Modules\Incubator\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GoalTaskTemplate extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    // protected static function newFactory()
    // {
    //     return \Modules\Incubator\Database\factories\TaskTemplateModelFactory::new();
    // }

    public function goalTemplates () {
        return $this->belongsToMany(GoalTaskTemplate::class)->using(PivotGoalTaskTemplate::class);
    }
}
