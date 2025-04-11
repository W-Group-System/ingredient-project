<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RawMaterial extends Model
{
     protected $connection = 'mysql';
     protected $table = 'raw_materials';
}
