<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAttributes extends Model
{
    protected $guarded = [];
    protected $table = 'product_attributes';
    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            //
        });
    }
    public function attribute()
    {
        return $this->belongsTo('App\Attribute');
    }
}
