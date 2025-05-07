<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RDR1 extends Model
{
     protected $connection = 'sqlsrv';
     protected $table = 'RDR1';

     public function oitm()
     {
     return $this->belongsTo(OITM::class, 'ItemCode', 'ItemCode');
     }
     public function bom()
    {
        return $this->hasMany(ITT1::class, 'Father', 'ItemCode'); 
    }
    public function owor()
    {
        return $this->hasOne(OWOR::class, 'OriginAbs', 'DocEntry')->where('OriginType', 17);
    }

}
