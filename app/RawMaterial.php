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
     public function oprq()
     {
        return $this->hasManyThrough(
            OPRQ::class, 
            PRQ1::class, 
            'ItemCode', // foreign key on POR1 table
            'DocEntry', // foreign key on OPOR table
            'item_code', // local key on raw_materials
            'DocEntry' // local key on POR1 table
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
