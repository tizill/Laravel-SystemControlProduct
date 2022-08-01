<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sale extends Model
{
    protected $fillable = ['product_id', 'date_sale', 'name_client', 'email_client', 'cpf_client', 'quantity_sale', 'discounts_sale', 'status_sale'];
    protected $primaryKey = 'id_sale';
}
