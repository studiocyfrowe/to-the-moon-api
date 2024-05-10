<?php

namespace App\Models;

use App\Observers\ReviewObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    public function movie()
    {
        return $this->belongsTo(Movie::class, 'movie_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::observe(ReviewObserver::class);
    }
}
