<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Checkout extends Model
{
    use HasFactory;

    protected $table = 'checkouts'; // Table name

    protected $fillable = [
        'user_id',
        'cart_id',
        'pro_qty',
        'pro_price',
        'grand_total',
    ];

    /**
     * Relationship with User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship with Cart
     */
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
}
