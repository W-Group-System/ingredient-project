<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdvancePurchaseRequest extends Model
{
     protected $connection = 'mysql';
     protected $table = 'advance_purchase_requests';

     public function pos()
     {
        return $this->hasOne(AdvancePurchaseOrder::class, 'pr_id', 'id');
     }

}
