<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class OrderDetails extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function order()
    {
        return $this->belongsTo('App\Models\Order','order_id');
    }
    public function product()
    {
        return $this->belongsTo('App\Models\Product','product_id');
    }
}
