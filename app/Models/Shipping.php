<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Shipping extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function area()
    {
        return $this->belongsTo('App\Models\Area','delivery_charge');
    }
}
