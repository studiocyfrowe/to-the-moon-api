<?php

declare(strict_types=1);

namespace App\Enum;

enum PostStatusEnum : string
{
    case PUBLISHED = 'PUBLISHED';
    case DRAFT = 'DRAFT';

    case HIDDEN = 'HIDDEN';
}
