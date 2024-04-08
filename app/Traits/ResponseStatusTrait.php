<?php

namespace App\Traits;

trait ResponseStatusTrait
{
    private static string $LOGOUT_SUCCESS = 'Successfully logged out';

    public function getMessage()
    {
        return response()->json(['message' => 'Successfully logged out'], 200);
    }

}
