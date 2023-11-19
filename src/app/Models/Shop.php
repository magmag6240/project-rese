<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_name',
        'shop_manager_id',
        'prefecture_id',
        'genre_id',
        'shop_detail',
        'image_url'
    ];

    public function prefecture()
    {
        return $this->belongsTo(Prefecture::class);
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }

    public function business_hours()
    {
        return $this->belongsToMany(BusinessHour::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }

    public function is_liked()
    {
        $id = Auth::id();

        $likers = array();
        foreach ($this->likes as $like) {
            array_push($likers, $like->user_id);
        }

        if (in_array($id, $likers)) {
            return true;
        } else {
            return false;
        }
    }

}
