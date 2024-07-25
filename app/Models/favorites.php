<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class favorites extends Model
{
    use HasFactory;
    protected $table = 'favorites_table';

    protected $fillable = [
        'product_id',
        'user_id'
    ];
}
