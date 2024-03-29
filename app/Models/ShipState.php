<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipState extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function division(){
        return $this->belongsTo(Shipdivision::class,'division_id','id');
    }

   
    public function district(){
        return $this->belongsTo(Shipdistrict::class,'district_id','id');
    }

}
