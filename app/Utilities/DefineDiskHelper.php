<?php

declare(strict_types=1);

namespace App\Utilities;

use App\Enums\SystemEnvironment;

class DefineDiskHelper
{
    public static function disk(): string
    {
        if (
            in_array(config('app.env'), [
                SystemEnvironment::PRODUCTION->value,
                SystemEnvironment::STAGING->value
            ])
        ) {
            return 's3';
        }

        if (config('app.env') === SystemEnvironment::LOCAL->value) {
            return 'public';
        }

        return SystemEnvironment::LOCAL->value;
    }
}
