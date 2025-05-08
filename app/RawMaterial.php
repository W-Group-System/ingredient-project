<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RawMaterial extends Model
{
     protected $connection = 'mysql';
     protected $table = 'raw_materials';

     public function oivl()
     {
        return $this->hasMany(OIVL::class, 'ItemCode', 'item_code');
     }
     public function advancePr()
     {
        return $this->hasMany(AdvancePurchaseRequest::class, 'item_code', 'item_code')
            ->whereHas('pos'); 
     }
     public function oprq()
     {
        return $this->hasManyThrough(
            OPRQ::class, 
            PRQ1::class, 
            'ItemCode', 
            'DocEntry', 
            'item_code', 
            'DocEntry' 
        )->where('PRQ1.ItemCode', '=', $this->item_code)
        ->where('PRQ1.TargetType', '=', '22')
        ->where(function ($query) {
            $query->where('DocStatus', '!=', 'C')
                  ->orWhere(function ($q) {
                      $q->where('DocStatus', 'C')
                        ->whereHas('por', function ($porQuery) {
                            $porQuery->where('DocStatus', 'O');
                        });
                  });
        });
     }    
}
