<?php

declare(strict_types=1);

namespace App\Support;

use Carbon\CarbonInterface;

class DateTimeRangeForHumanSupport
{
    public static function date(CarbonInterface $startTime, CarbonInterface $endTime): string
    {
        if ($startTime->isSameDay($endTime)) {
            $startDay = self::abbreviateDay($startTime->dayOfWeek);
            $startFormat = $startTime->translatedFormat('M');

            return $startDay
                   . ', '
                   . $startTime->translatedFormat('d')
                   . ' '
                   . $startFormat
                   . ' - '
                   . $endTime->translatedFormat('H:i');
        }

        $startFormat = $startTime->translatedFormat('d M');
        $endFormat = $endTime->translatedFormat('d M');

        return $startFormat . ' > ' . $endFormat;
    }

    private static function abbreviateDay(int $dayOfWeek): string
    {
        return match ($dayOfWeek) {
            0 => trans('days.sun'),
            1 => trans('days.mon'),
            2 => trans('days.tue'),
            3 => trans('days.wed'),
            4 => trans('days.thu'),
            5 => trans('days.fri'),
            6 => trans('days.sat'),

            default => '',
        };
    }
}
