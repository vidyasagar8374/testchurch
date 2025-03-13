<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class massrequest extends Model
{
    use HasFactory;
    protected $table='massrequests';
    public function massrequestlist(){
        return $this->hasMany(massList::class, 'mass_id', 'id');
    }
    public function paymentdata(){
        return $this->hasOne(payments::class, 'merchantTransactionId', 'merchant_id');
    }
}
