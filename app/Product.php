<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //changed from guarded to fillable
    protected $fillable = [
        'name',
        'price',
        'description',
    ];

    public function createdAt()
    {
        return $this->created_at->toFormattedDateString();
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function product()
    {
        return $this->hasMany('App\Product', 'product_id');
    }
}
