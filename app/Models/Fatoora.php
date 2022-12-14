<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;

class Fatoora extends Model
{
    use HasFactory;


    protected $fillable = ['name', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class,'user_id', 'id');
    }


    public function product(){
        return $this->belongsToMany(Product::class)->withPivot('mount');
    }

}
