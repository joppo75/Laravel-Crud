<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Product\Database\Factories\ProductFactory;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'description', 'price', 'status', 'stock_quantity'];

}
