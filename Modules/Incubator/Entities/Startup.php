<?php

namespace Modules\Incubator\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Startup extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [];

    // protected static function newFactory()
    // {
    //     return \Modules\Incubator\Database\factories\StartupModelFactory::new();
    // }

    public function startupUsers()
    {
        return $this->hasMany(StartupUser::class);
    }

    public function goals()
    {
        return $this->hasMany(Goal::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function askingDocs()
    {
        return $this->hasMany(AskingDocs::class);
    }

    public function askHelps()
    {
        return $this->hasMany(AskHelp::class);
    }

    public function startupNotifications () {
        return $this->hasMany(StartupNotifications::class);
    }
}
