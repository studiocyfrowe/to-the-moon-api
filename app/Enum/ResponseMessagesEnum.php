<?php

declare(strict_types=1);
namespace App\Enum;

enum ResponseMessagesEnum : string
{
    case ERROR = 'ERROR';
    case NOT_FOUND = 'NOT FOUND';
    case EMPTY = 'EMPTY';
}
