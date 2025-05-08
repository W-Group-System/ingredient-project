<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OPRQ extends Model
{
     protected $connection = 'sqlsrv';
     protected $table = 'OPRQ';

     public function prq1()
     {
     return $this->hasMany(PRQ1::class, 'DocEntry', 'DocEntry');
     }

     public function por()
     {
     return $this->hasManyThrough(
          OPOR::class,
          POR1::class,  
          'BaseEntry',  
          'DocEntry',  
          'DocEntry',   
          'DocEntry'    
     ); 
     }
}
