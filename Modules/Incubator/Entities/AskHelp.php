<?php

namespace Modules\Incubator\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AskHelp extends Model
{
    use HasFactory;

    protected $fillable = [
        'startup_id',
        'message',
        'status',
        'helper_user_id',
    ];

    // protected static function newFactory()
    // {
    //     return \Modules\Incubator\Database\factories\AskHelpFactory::new();
    // }
}
