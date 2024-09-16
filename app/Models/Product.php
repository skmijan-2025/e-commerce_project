<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Product extends Model
{


    protected $fillable = [
        'category_id',
        'photo',
        'name',
        'price',
        'description',
        'stock',
    ];



    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
