<?php

namespace Modules\Incubator\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Startup extends Model
{
    use HasFactory;

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

    public function documentDemands () {
        return $this->hasMany(DocumentDemand::class);
    }
}
