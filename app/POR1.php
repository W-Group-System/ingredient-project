<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class POR1 extends Model
{
     protected $connection = 'sqlsrv';
     protected $table = 'POR1';

     public function opor()
    {
        return $this->belongsTo(OPOR::class, 'DocEntry', 'DocEntry');
    }
}
