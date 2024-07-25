<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    use HasFactory;
    protected $table = 'orders_table';

    protected $fillable = [
        'product_id',
        'user_id',
        'order_date',
        'total_price'
    ];
}
