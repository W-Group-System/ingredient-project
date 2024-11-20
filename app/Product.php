<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Product extends Model  
{
    protected $connection = 'mysql_crms';
    protected $table = "products";
    
   
    // public function product_raw_materials()
    // {
    //     return $this->hasMany(ProductRawMaterials::class);
    // }

    public function productMaterialComposition()
    {
        return $this->hasMany(ProductMaterialsComposition::class, 'ProductId');
    }

    // public function productSpecification()
    // {
    //     return $this->hasMany(ProductSpecification::class,'ProductId');
    // }

    // public function productFiles()
    // {
    //     return $this->hasMany(ProductFiles::class,'ProductId');
    // }

    // public function productDataSheet()
    // {
    //     return $this->hasOne(ProductDataSheet::class, 'ProductId');
    // }

    // public function productEventLogs()
    // {
    //     return $this->hasMany(UserEventLogs::class, 'Value', 'code');
    // }

    // public function productRps()
    // {
    //     return $this->hasMany(RequestProductEvaluation::class, 'DdwNumber', 'ddw_number');
    // }

    // public function sampleRequestProduct()
    // {
    //     return $this->hasMany(SampleRequestProduct::class, 'ProductCode', 'code');
    // }

    // public function application()
    // {
    //     return $this->belongsTo(ProductApplication::class);
    // }

    // public function approveById()
    // {
    //     return $this->belongsTo(User::class, 'approved_by', 'id');
    // }
    // public function approveByUserId()
    // {
    //     return $this->belongsTo(User::class, 'approved_by', 'user_id');
    // }
}
