<?php

namespace Modules\Incubator\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StartupNotifications extends Model
{
    use HasFactory;

    protected $fillable = ['viewed', 'startup_id'];
    
    // protected static function newFactory()
    // {
    //     return \Modules\Incubator\Database\factories\StartupNotificationsFactory::new();
    // }

    public function startupNotifiable () {
        return $this->morphTo();
    }


}
