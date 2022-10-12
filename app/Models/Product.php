<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\CssSelector\Node\FunctionNode;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'number_in_package', 'price_of_package', 'price_sell_piece'];

    public function fatoora(){
        return $this->belongsToMany(Fatoora::class);

    }

    public Function scopeMax100($q){
        return $q->where('price_sell_piece','>', 1);
    }
}
