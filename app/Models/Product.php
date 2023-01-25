<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description',
        'product_type_id'
    ];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable')->latestOfMany();
    }

    public function productType()
    {
        return $this->belongsTo(ProductType::class);
    }

    public function variants()
    {
        return $this->hasMany(Variant::class);
    }
}
