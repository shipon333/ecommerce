<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductSubImage extends Model
{
     public function subImage(){
    	return $this->belongsTo(Product::class,'product_id','id');
    }
}
