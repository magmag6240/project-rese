<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prefecture extends Model
{
    use HasFactory;

    protected $fillable = [
        'pref_name'
    ];

    public function shops()
    {
        return $this->hasMany(Shop::class);
    }
}
