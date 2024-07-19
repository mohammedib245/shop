<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productColorsize extends Model
{
    use HasFactory;

    protected $table = 'product_colorsizes';
    protected $fillable = ['color_id','size_id','quantity','pricetwo','discounttwo','status'];

}
