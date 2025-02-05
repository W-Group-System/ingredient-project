<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OITM extends Model
{
     protected $connection = 'sqlsrv';
     protected $table = 'OITM';

     public function ItemGroup()
     {
     return $this->belongsTo(OITB::class, 'ItmsGrpCod', 'ItmsGrpCod');
     }

     public function warehouse()
{
    return $this->hasMany(OITW::class, 'ItemCode', 'ItemCode');
}
}
