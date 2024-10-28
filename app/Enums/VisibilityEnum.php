<?php

declare(strict_types=1);

namespace App\Enums;

enum VisibilityEnum: string
{
    case PUBLIC = 'public';
    case PRIVATE = 'private';

    public function label(): string
    {
        return match ($this) {
            self::PUBLIC => 'public',
            self::PRIVATE => 'private',
        };
    }

    public function text(): string
    {
        return match ($this) {
            self::PUBLIC => trans('labels.public'),
            self::PRIVATE => trans('labels.private'),
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::PUBLIC => 'bg-green-500',
            self::PRIVATE => 'bg-gray-500',
        };
    }
}
