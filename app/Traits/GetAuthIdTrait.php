<?php

namespace App\Traits;

trait GetAuthIdTrait
{
    public function getUserId()
    {
        return auth()->user();
    }

}
