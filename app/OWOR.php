<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OWOR extends Model
{
     protected $connection = 'sqlsrv';
     protected $table = 'OWOR';

     public function wor1()
     {
          return $this->hasMany(WOR1::class, 'DocEntry', 'DocEntry');
     }
}
