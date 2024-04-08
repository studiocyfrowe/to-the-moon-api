<?php

namespace App\Traits;

trait ResponseDataTrait
{
    public function getData($data)
    {
        return response()->json([
            $data
        ], 200);
    }
}
