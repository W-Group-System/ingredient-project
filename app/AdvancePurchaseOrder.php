<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdvancePurchaseOrder extends Model
{
     protected $connection = 'mysql';
     protected $table = 'advance_purchase_orders';

     public function purchase_request()
     {
          return $this->belongsTo(AdvancePurchaseRequest::class, 'pr_id', 'id');
     }
}
