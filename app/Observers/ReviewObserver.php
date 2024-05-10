<?php

namespace App\Observers;

use App\Models\Review;
use App\Traits\GetAuthIdTrait;

class ReviewObserver
{
    use GetAuthIdTrait;

    public function creating(Review $review)
    {
        $review->user_id = $this->getUserId();
    }
}
