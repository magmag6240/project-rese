<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'shop_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function is_liked()
    {
        $id = Auth::id();

        $likers = array();
        foreach ($this as $like) {
            array_push($likers, $like);
        }

        if (in_array($id, $likers)) {
            return true;
        } else {
            return false;
        }
    }
}
