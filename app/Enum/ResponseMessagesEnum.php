<?php

declare(strict_types=1);
namespace App\Enum;

enum ResponseMessagesEnum : string
{
    case SUCCESS = 'SUCCESS';

    case ERROR = 'ERROR';
    case NOT_FOUND = 'NOT FOUND';
    case EMPTY = 'EMPTY';
    case REQUIRED_PARAM = 'REQUIRED PARAM';
}
