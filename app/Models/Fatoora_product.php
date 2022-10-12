<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fatoora_product extends Model
{
    use HasFactory;

    protected $fillable = ['fatoora_id', 'product_id','mount'];

}
