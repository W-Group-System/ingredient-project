<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RawMaterial extends Model
{
    protected $connection = 'mysql_crms';
    protected $table = "productmaterials";

    public function productMaterialCompositions()
    {
        return $this->hasMany(ProductMaterialsComposition::class, 'MaterialId');
    }
}
