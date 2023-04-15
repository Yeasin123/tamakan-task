<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class City extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function area()
    {
        return $this->hasMany('App\Models\Area');
    }
}
