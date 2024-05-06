<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    use HasFactory;

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function cinemaType()
    {
        return $this->belongsTo(CinemaType::class, 'cinema_type_id');
    }
}
