<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PRQ1 extends Model
{
     protected $connection = 'sqlsrv';
     protected $table = 'PRQ1';

     public function pqT1()
     {
         return $this->hasMany(PQT1::class, 'DocNum', 'BaseRef');
     }
     public function por1()
    {
        return $this->hasMany(POR1::class, 'BaseEntry', 'DocEntry');
    }

}
