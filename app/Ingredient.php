<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $table = 'ingredient_table';

    protected $fillable = [
        'ingredient',
        'inventoryPerkg',
        'groupid',
    ];
}
