<?php

declare(strict_types=1);

namespace App\Utilities;

use App\Enums\StateEnum;
use App\Enums\VisibilityEnum;

enum EnumHelper
{
    public static function visibilities(): array
    {
        return array_map(
            fn(VisibilityEnum $visibility)
                => [
                'name' => $visibility->text(),
                'value' => $visibility->value,
            ],
            VisibilityEnum::cases(),
        );
    }

    public static function states(): array
    {
        return array_map(
            fn(StateEnum $state)
                => [
                'name' => $state->text(),
                'value' => $state->value,
            ],
            StateEnum::cases(),
        );
    }
}
