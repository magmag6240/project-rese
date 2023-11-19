<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_id',
        'menu_name',
        'price',
        'menu_detail'
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function reservations()
    {
        return $this->hasManyThrough(Reservation::class, Shop::class);
    }
}
