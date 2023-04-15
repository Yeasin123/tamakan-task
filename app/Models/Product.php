<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Product extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function category()
    {
        return $this->belongsTo('App\Models\Category','category_id');
    }


    public function brand()
    {
        return $this->belongsTo('App\Models\Brand','brand_id');
    }


    public function orderDetail()
    {
        return $this->hasMany('App\Models\OrderDetails','product_id');
    }

}
