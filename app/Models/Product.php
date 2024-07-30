<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'qty',
        'thumbnail',
        'description',
        'user_id',
        'category_id',
        'discount_id',
        'sale_price',
        'viewer',
        'regular_price'
    ];	
    public function sizes()
    {
        return $this->belongsToMany(Size::class,'productsizes','product_id','size_id');
    }	
    public function colors()
    {
        return $this->belongsToMany(Color::class,'productcolors','product_id','color_id');
    }
   								
}
