<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    protected $table = 'product_table';

    protected $fillable = [
        'title',
        'quantity',
        'category_id',
        'original_price',
        'selling_price',
        'image'
    ];
}
