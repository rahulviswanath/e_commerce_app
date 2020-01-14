<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $guarded = [];
    protected $table = 'attribute_master';
    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            $model->created_by = auth()->user()->id;
        });
    }
}
