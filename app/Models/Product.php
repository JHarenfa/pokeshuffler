<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'product_id';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
        'category_id',
        'rarity_id',
        'type_id',
        'price',
        'stock',
        'image_url',
        'is_popular'
    ];
}
