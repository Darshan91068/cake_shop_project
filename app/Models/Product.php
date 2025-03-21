<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'pro_category_id',
        'pro_name',
        'pro_weight',
        'pro_price',
        'pro_description',
        'pro_discount',
        'pro_quantity',
        'pro_img',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'pro_category_id', 'id');
    }
}
