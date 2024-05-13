<?php

namespace App\Observers;

use App\Models\Favorite;
use App\Traits\GetAuthIdTrait;

class FavoriteObserver
{
    use GetAuthIdTrait;
    public function saving(Favorite $favorite)
    {
        $favorite->user_id = $this->getUserId();
    }
}
