<?php

namespace App\Enum;

enum ResponseStatusEnum : int
{
    case SUCCESS = 200;

    case NOT_FOUND = 404;

    case UNPROCESSABLE_ENTITY = 422;

    case BAD_REQUEST = 400;
}
