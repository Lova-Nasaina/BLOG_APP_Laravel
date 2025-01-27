<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id', 'product_name', 'product_price', 'description', 'photo', 'created_at'];


    public function user(){
        return $this->belongsTo(User::class);
    }


}
