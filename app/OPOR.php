<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OPOR extends Model
{
     protected $connection = 'sqlsrv';
     protected $table = 'OPOR';

     public function por1()
    {
        return $this->hasMany(POR1::class, 'DocEntry', 'DocEntry');
    }
}
