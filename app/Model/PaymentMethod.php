<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    public function methode(){
    	return $this->belongsTo(Methode::class,'method_id','id');
    }
}
