<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = ['name_product', 'description_product', 'price_product', 'image_product'];
    protected $primaryKey = 'id_product';
}
