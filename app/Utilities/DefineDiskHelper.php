<?php

declare(strict_types=1);

namespace App\Utilities;

use App\Enums\SystemEnvironment;

class DefineDiskHelper
{
    public static function disk(): string
    {
        if (config('app.env') === SystemEnvironment::PRODUCTION->value) {
            return 's3';
        }

        return SystemEnvironment::LOCAL->value;
    }
}