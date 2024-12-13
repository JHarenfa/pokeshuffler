<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rarity extends Model
{
    use HasFactory;
    protected $primaryKey = 'rarity_id';
    public $timestamps = false;

    protected $fillable = [
        'name'
    ];
}