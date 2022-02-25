<?php

namespace Modules\Incubator\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AskingDocs extends Model
{
    use HasFactory;
    public $table = "document_demands";
    protected $fillable = [
        'startup_id',
        'helper_user_id',
        'by_startup',
        'document_title',
        'document_description',
    ];

    // protected static function newFactory()
    // {
    //     return \Modules\Incubator\Database\factories\DocumentDemandFactory::new();
    // }

    public function StartupNotifications()
    {
        return $this->morphMany(StartupNotifications::class, 'startupNotifiable');
    }
}
