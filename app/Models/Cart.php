<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
     // Allow mass assignment for these fields
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity'
    ];

    // Optional: Define the relationship between Cart and Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
