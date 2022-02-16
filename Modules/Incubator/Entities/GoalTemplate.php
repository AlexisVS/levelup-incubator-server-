<?php

namespace Modules\Incubator\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GoalTemplate extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    // protected static function newFactory()
    // {
    //     return \Modules\Incubator\Database\factories\GoalTemplateModelFactory::new();
    // }

    public function taskTemplates () {
        return $this->hasMany(TaskTemplate::class);
    }
}
