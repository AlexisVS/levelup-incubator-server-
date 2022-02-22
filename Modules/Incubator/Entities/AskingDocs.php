<?php

namespace Modules\Incubator\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AskingDocs extends Model
{
    use HasFactory;
    public $table = "document_demands";
    protected $fillable = [];
    
    // protected static function newFactory()
    // {
    //     return \Modules\Incubator\Database\factories\DocumentDemandFactory::new();
    // }
}
