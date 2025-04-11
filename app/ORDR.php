<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ORDR extends Model
{
     protected $connection = 'sqlsrv';
     protected $table = 'ORDR';

     public function rdr1()
     {
          return $this->hasMany(RDR1::class, 'DocEntry', 'DocEntry');
     }

     public function productionOrders()
     {
          return $this->hasMany(OWOR::class, 'OriginNum', 'DocNum');
     }
}
