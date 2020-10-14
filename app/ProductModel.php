<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
   protected $table='products';
   protected $primaryKey='id';
   protected $fillable=['pro_name', 'pro_code', 'pro_price', 'pro_info', 'image', 'spl_price', 'stock', 'category_id'];

}
