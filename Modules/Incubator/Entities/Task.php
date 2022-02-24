<?php

namespace Modules\Incubator\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [];

    protected static function newFactory()
    {
        return \Modules\Incubator\Database\factories\TaskFactory::new();
    }

    public function StartupNotifications()
    {
        return $this->morphMany(StartupNotifications::class, 'startupNotifiable');
    }
}
