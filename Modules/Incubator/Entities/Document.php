<?php

namespace Modules\Incubator\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Document extends Model
{
    use HasFactory;

    protected $fillable = ['filepath', 'name'];

    // protected static function newFactory()
    // {
    //     return \Modules\Incubator\Database\factories\DocumentModelFactory::new();
    // }
}
