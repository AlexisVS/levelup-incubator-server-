<?php

namespace Modules\Incubator\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AskHelp extends Model
{
    use HasFactory;

    protected $fillable = [
        'helper_user_id',
        'startup_id',
        'message',
        'status',
    ];

    // protected static function newFactory()
    // {
    //     return \Modules\Incubator\Database\factories\AskHelpFactory::new();
    // }

    public function StartupNotifications () {
        return $this->morphMany(StartupNotifications::class, 'startupNotifiable');
    }
}
