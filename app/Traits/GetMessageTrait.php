<?php

namespace App\Traits;

trait GetMessageTrait
{
    public function responseMessage($msg, $status)
    {
        return response()->json([
            'message' => $msg
        ], $status);
    }
}
