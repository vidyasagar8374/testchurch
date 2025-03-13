<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class massList extends Model
{
    use HasFactory;
    protected $table='MassListData';
    public function masslistname(){
        return $this->hasMany(Requestlist::class, 'id', 'mass_info');
    }
 
}
