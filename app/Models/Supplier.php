<?php

namespace App\Models;

use Illuminate\Validation\Validator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = ['name','product_id','date',];

    // Relasi Many-to-One dengan model Supplier
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    
}
