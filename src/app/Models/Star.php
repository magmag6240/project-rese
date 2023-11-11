<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Star extends Model
{
    use HasFactory;

    protected $fillable = [
        'stars'
    ];

    public function evaluates()
    {
        return $this->hasMany(Evaluation::class);
    }
}
