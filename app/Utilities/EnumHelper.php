<?php

declare(strict_types=1);

namespace App\Utilities;

use App\Enums\VisibilityEnum;

enum EnumHelper
{
    public static function visibilities(): array
    {
        /*return array_column(
            VisibilityEnum::cases(),
            'value',
            'name'
        );*/
        return array_map(
            fn(VisibilityEnum $visibility)
                => [
                'name' => $visibility->text(),
                'value' => $visibility->value,
            ],
            VisibilityEnum::cases(),
        );
    }
}
