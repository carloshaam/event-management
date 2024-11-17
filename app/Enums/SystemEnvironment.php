<?php

declare(strict_types=1);

namespace App\Enums;

enum SystemEnvironment: string
{
    case PRODUCTION = 'production';
    case STAGING = 'staging';
    case LOCAL = 'local';
}
