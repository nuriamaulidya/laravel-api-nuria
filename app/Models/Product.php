<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
    ];

    // Relasi One-to-Many dengan model Product
    public function supplier()
    {
        return $this->hasMany(Product::class);
    }

}
