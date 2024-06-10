<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IncomingIngredient extends Model
{
    protected $table = 'incoming_ingredients';
    protected $fillable = [
        'pr_no',
        'po_no',
        'qty',
        'product_name_id',
        'incoming_groupId',
    ];
}
