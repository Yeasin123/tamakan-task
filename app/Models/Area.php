<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Area extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function city()
    {
        return $this->belongsTo('App\Models\City','city_id');
    }
    public function shipping()
    {
        return $this->hasMany('App\Models\Shipping','delivery_charge');
    }
}
