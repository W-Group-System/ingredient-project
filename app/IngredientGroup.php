<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IngredientGroup extends Model
{
     protected $connection = 'mysql';
     protected $table = 'ingredient_groups';

     public function items()
     {
        return $this->hasMany(IngredientGroupItem::class, 'group_id', 'id');
     }
}
