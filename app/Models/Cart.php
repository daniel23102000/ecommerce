<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table='user_cart';

    protected $fillable=[
       'buyer_user',
       'product_owner',
       'product_price',
       'id_product'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'product_owner');
    }
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
