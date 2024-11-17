<?php

declare(strict_types=1);

namespace App\Enums;

enum StageEnum: string
{
    case DRAFT = 'draft';
    case PUBLISHED = 'published';
    case CLOSED = 'closed';

    public function label(): string
    {
        return match ($this) {
            self::DRAFT => 'draft',
            self::PUBLISHED => 'published',
            self::CLOSED => 'closed',
        };
    }

    public function text(): string
    {
        return match ($this) {
            self::DRAFT => trans('labels.draft'),
            self::PUBLISHED => trans('labels.published'),
            self::CLOSED => trans('labels.closed'),
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::DRAFT => 'bg-gray-500',
            self::PUBLISHED => 'bg-green-500',
            self::CLOSED => 'bg-black',
        };
    }
}
