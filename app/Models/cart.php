<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class cart extends Model
{
    use HasFactory;

    protected $table = 'cart_table';

    protected $fillable = [
        'product_id',
        'user'
    ];
}
