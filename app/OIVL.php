<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OIVL extends Model
{
    protected $connection = 'sqlsrv';
    protected $table = 'OIVL';    

    public function item()
    {
        return $this->belongsTo(OITM::class, 'ItemCode', 'ItemCode');
    }
}
