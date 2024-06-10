<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductName extends Model
{
    protected $table = 'product_names';
    protected $fillable = [
        'type',
        'product_name',
    ];
}
