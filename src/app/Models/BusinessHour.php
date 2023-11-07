<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class BusinessHour extends Model
{
    use HasFactory;

    public function shops()
    {
        return $this->belongsToMany(Shop::class);
    }

    function getBusinessHourAttribute($value)
    {
        return $value = Carbon::parse($value)->format('H:i');
    }
}
