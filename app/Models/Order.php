<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Order extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function orderDetail()
    {
        return $this->hasMany('App\Models\OrderDetails','order_id');
    }
}
