<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];
    protected $table = 'products';
    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            $model->created_by = auth()->user()->id;
        });
    }
}
