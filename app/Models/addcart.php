<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class addcart extends Model
{
    use HasFactory;
    protected $table="addcart";

    protected $fillable=[
      
        "cart_data",
    ];
}
